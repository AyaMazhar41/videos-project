<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="fa fa-youtube"></i>
          </div>
          <p class="card-category"> Videos</p>
          <h3 class="card-title">{{\App\Models\video::count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
          <a href="{{route('videos.index')}}" style="color: white">Get more information about videos...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="fa fa-book"></i>
          </div>
          <p class="card-category">Skills</p>
          <h3 class="card-title">{{\App\Models\skill::count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <a  href="{{route('skills.index')}}" style="color: white">Get more information about skills...</a>

          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="fa fa-tags"></i>
          </div>
          <p class="card-category">Tags </p>
          <h3 class="card-title"> {{\App\Models\tag::count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <a  href="{{route('tags.index')}}" style="color: white">Get more information about tags...</a>

          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="fa fa-comments"></i>
          </div>
          <p class="card-category">Comments</p>
          <h3 class="card-title">{{\App\Models\comment::count()}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <a  href="{{route('videos.index')}}" style="color: white">check videos...</a>

          </div>
        </div>
      </div>
    </div>
  </div>
