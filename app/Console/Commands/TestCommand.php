<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use Modules\PhishingList\Entities\PhishingList;
use Modules\PhishingList\Entities\Senders;
use Modules\PhishingList\Entities\MailLog;
use Modules\MailSenders\Entities\MailSenders;
use Modules\EmailList\Entities\EmailList;
use Modules\MailTemplates\Entities\Template;
use Modules\PhishingList\Http\Requests\CreatePhishing;
use Mail;
use Modules\PhishingList\Emails\SendMailPhishing;
use Carbon\Carbon;
use Modules\Setting\Entities\Setting;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info('start cron');
        
        $phishing = PhishingList::where('status_id',1)
                                ->type('custom')
                                ->where('sending_date','<',Carbon::now()->format('Y-m-d H:i:s'))
                                ->get();
        
        $emailsDivideNember = 5; // will change this number from the setting
        // $emailsDivideNember = Setting::getSettingValue('emails_number_per_sender_email'); // will change this number from the setting
        
        foreach ($phishing  as $phish ) {
            // $phish->update(['status_id' => 2]);
            \Log::info('start phishing');
            $faildEmails = [] ;
            $successedEmails = [] ;
            
            
            $phishingSendersEmails = $phish->senders()->pluck('email')->toArray();
            $phishingReciversEmails = $phish->emails()->toArray();
            $phishingReciversEmails = \array_chunk( $phishingReciversEmails,$emailsDivideNember);
            
            

            $finalEmails=[];

            for ($i=0; $i < count($phishingReciversEmails); $i++) { 
                $finalEmails[$phishingSendersEmails[$i]]=$phishingReciversEmails[$i];
            }
            
            $template = Template::findOrFail($phish->template_id);
            //dd('f');
            foreach ($finalEmails as $senderEmail => $recevingEmails) {
                
                $data = [
                        'template' => $template->getTemplateBladeFile(),
                        'subject' => $phish->title,
                        'name' => $phish->snder_name,
                        'address' => $senderEmail,
                        'phishing_id' =>  $phish->id,
                    ];
                
                foreach ($recevingEmails as $email) {
                    $data['email_id'] =  $email['id'];    

                    if ($template->link_text != null && $template->link_url != null) {
            
                        $link = route('open-phishing-url', ['phishing' => $data['phishing_id'],'email' => $data['email_id'] ]);
            
                        $link_element = "<a target='_blank' href='".$link."'>".$template->link_text."</a>";
                        
                        $data['link'] = $link_element;    
                    }else{
                        $data['link'] = '';    
                    }

                    // dd($finalEmails);
                    try {
                        
                        Mail::to($email['email'])->send(new SendMailPhishing($data));
                        \Log::info('send email');

                        sleep(2);
                        $successedEmails[] = ['phishing_id'=> $phish->id,
                                      'email_id'   => $email['id'],
                                      'is_sent'    => 1
                                    ];
                    } catch (\Throwable $th) {
                        dd($th);
                        \Log::info($th);

                        $faildEmails[] = ['phishing_id'=> $phish->id,
                                        'email_id'   => $email['id'],
                                        'is_sent'    => 0
                                    ];
                        continue ;
                    }
                }            
            }

            if(count($faildEmails) == 0){
                MailLog::insert($successedEmails);
                $phish->update(['status_id' => 3]);
                \Log::info('change status to done');
            }else{
                MailLog::insert($faildEmails);
                $phish->update(['status_id' => 4]);
                \Log::info('change status to fail');
            }

            \Log::info('end phishing');
            
        }

        \Log::info('finish cron');

    }
}
