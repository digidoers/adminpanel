@extends('admin.layouts.admin_layout')




@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   



    @include('admin.includes.breadcrumbs',['title'=>$pageName, 'breadCrumbs'=>$breadCrumbs]) 
    
    
   
    <!-- Main content -->

    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success ml-3" href="{{ route($routeName.'create') }}" > Create New Email Template</a>
            </div>
            <br>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
      @include('admin.includes.flashmessage')
      
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Subject</th>
                    <th>Parameters</th>
                    <th>Template</th>
                    <th>Status</th>
                    <th data-orderable="false">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($emailtemplate as $et)
                
                  
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$et->subject}}</td>
                    <td>{{$et->params}}</td>
                    <td>{{$et->template}}</td>
              
                    <td><a href="{{route($routeName.'status',$et->id)}}" title = "{{($et->status==1)?'Inactive':'Active'}}">@if($et->status==1)
                        Active 
                       @else
                      Inactive
                    @endif
                    </a>
                    </td>
                  
                    <td>
                    <form onsubmit="return confirm('Are you sure?')" action="{{ route($routeName.'destroy',$et->id) }}" method="POST">
                    <a class="btn btn-info" href="{{route($routeName.'edit',$et->id)}}" title="Edit">Edit</a> 
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger" title="Delete">Delete</button>
                </form>
                    </td>
                    
                  </tr>
                 
                  @endforeach
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection



@section('script')

 <!-- DataTables -->
<script src="{{url('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
     
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
    });
  });
</script>

@endsection