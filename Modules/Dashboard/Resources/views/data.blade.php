<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-info">
        <div class="inner">
        <h3>{{$sentEmailsCount}}</h3>

          <p>Email Sent</p>
        </div>
        <div class="icon">
          <i class="fas fa-paper-plane"></i>
          
        </div>
        {{-- <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a> --}}
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$openedEmailsCount}}</h3>

          <p>Interactive Users</p>
        </div>
        <div class="icon">
          <i class="fas fa-envelope-open"></i>
        </div>
        {{-- <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a> --}}
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$phishingListCount}}</h3>

          <p>Sent Custom Phishing </p>
        </div>
        <div class="icon">
          <i class="fas fa-stream"></i>
        </div>
        {{-- <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a> --}}
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$openedUrlsCount}}</h3>

          <p>Unaware Users</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-tag"></i>
        </div>
        {{-- <a href="#" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a> --}}
      </div>
    </div>
    <!-- ./col -->
  </div>