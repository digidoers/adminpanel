<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.users.dashboard') }}">Home</a></li>

             @foreach($breadCrumbs as $bd)
              <li class="breadcrumb-item">
                  @if(!$bd['is_active'])
                  <a href="{{$bd['url'] }}">{{ $bd['name'] }}</a>
                  @else 
                  {{ $bd['name'] }}
                  @endif
                </li>
              @endforeach
            </ol>
          </div>
        </div>
      </div>
    </section> 