<div class="row">
  <div class="col-md-6">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Interval Time</h3>
        
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="intervalTime" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></canvas>
            </div>
            
          </div>
          <!-- /.card-body -->
        </div>
  </div>  
  <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Receving Emails By Gender</h3>
          
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="emailsByGender" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></canvas>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Open email and URL by Male</h3>
          
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="MaleEmailLogs" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></canvas>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Open email and URL by Female</h3>
          
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="FemaleEmailLogs" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 732px;" width="732" height="250" class="chartjs-render-monitor"></canvas>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>

@section('js')
  <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

  <script>
      $(function () {
          new Chart(document.getElementById("intervalTime"), {
            type: 'line',
            data: {
              labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23],
              datasets: [{ 
                  data: {!! json_encode(array_values($emailLogsData['email_opened_at']['male'])) !!},
                  label: "Male",
                  borderColor: "#3e95cd",
                  fill: false
                }, { 
                  data: {!! json_encode(array_values($emailLogsData['email_opened_at']['female'])) !!},
                  label: "Female",
                  borderColor: "#8e5ea2",
                  fill: false
                }, 
              ]
            },
            options: {
              title: {
                display: false,
                text: 'World population per region (in millions)'
              }
            }
          });
          

          // ----------------------------------------------------------//
          var emailsByGender        = {
              labels: [
                  'Male', 
                  'Female',
              ],
              datasets: [
                  {
                      data: [{{$emailLogsData['email_sent']['male']}},{{$emailLogsData['email_sent']['female']}}],
                      backgroundColor : ['#f56954', '#00a65a'],
                  }
              ]
          }

          var emailsByGenderCanvas = $('#emailsByGender').get(0).getContext('2d')
          var emailsByGenderData        = emailsByGender;
          var emailsByGenderOptions     = {
          maintainAspectRatio : false,
          responsive : true,
          }

          var emailsByGenderPie = new Chart(emailsByGenderCanvas, {
              type: 'bar',
              data: emailsByGenderData,
              options: emailsByGenderOptions      
              })

          // ----------------------------------------------------------//
          var MaleEmailLogs        = {
              labels: [
                  'Open URL', 
                  'Open Email',
              ],
              datasets: [
                  {
                  data: [{{$emailLogsData['open_url']['male']}},{{$emailLogsData['open_email']['male']}}],
                  backgroundColor : ['#f56954', '#00a65a'],
                  }
              ]
          }

          var MaleLogPieCanvas = $('#MaleEmailLogs').get(0).getContext('2d')
          var maleLogPieData        = MaleEmailLogs;
          var maleLogPieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
          }

          var maleLogPie = new Chart(MaleLogPieCanvas, {
              type: 'pie',
              data: maleLogPieData,
              options: maleLogPieOptions      
              })

          // ----------------------------------------------------------//
          
          var FemaleEmailLogs        = {
              labels: [
                  'Open URL', 
                  'Open Email',
              ],
              datasets: [
                  {
                  data: [{{$emailLogsData['open_url']['female']}},{{$emailLogsData['open_email']['female']}}],
                  backgroundColor : ['#f56954', '#00a65a'],
                  }
              ]
          }

          var femaleLogPieCanvas = $('#FemaleEmailLogs').get(0).getContext('2d')
          var femaleLogPieData        = FemaleEmailLogs;
          var femaleLogPieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
          }

          var femaleLogPie = new Chart(femaleLogPieCanvas, {
              type: 'pie',
              data: femaleLogPieData,
              options: femaleLogPieOptions      
              })
          
          //---------------------------------------------------------------//


      })

  </script>
@endsection