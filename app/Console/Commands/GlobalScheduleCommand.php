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
use Modules\Schedule\Entities\Schedule;

class GlobalScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:global';

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
        Schedule::runGlobalSchedules();
    }
}
