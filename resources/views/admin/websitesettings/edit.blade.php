@extends('admin.layouts.admin_layout')

@section('content')

   
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.includes.breadcrumbs', ['title'=>$pageName, 'breadCrumbs'=>$breadCrumbs])
    



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @include('admin.includes.flashmessage')   
        <div class="row">
          <!-- left column --> 
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Settings </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" action="{{ route($routeName.'update') }}" method="POST" >
              @csrf
              @method('PUT')
                <div class="card-body">

                @foreach ($website_setting as $ws)

                    <div class="form-group">
                    <label class = "{{($ws->is_require==1)?'require-input':''}}">{{$ws->label_name}}</label>
                    @if($ws->input_type=='textarea')
                    <textarea name="setting[{{$ws->id}}]" class="form-control" {{ $ws->is_require==1?'required':'' }}>{{$ws->input_value}} </textarea>
                    @else
                    <input type="{{$ws->input_type}}" name="setting[{{$ws->id}}]" class="form-control"   value="{{$ws->input_value}}"   {{ $ws->is_require==1?'required':'' }}> 
                    @endif
                    @error('$ws->label_name')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror
                   </div>
              
                @endforeach


                </div> 
                <!-- /.card-body -->
                  <div class="card-footer"> 
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div> 
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div> 
      <!-- /.container-fluid -->
    </section> 
    <!-- /.content -->
@endsection 

@section('script')

<style>.require-input:after {
font-weight: bold;
color: red;
content: " *";
}</style>
<!-- jquery-validation -->
<script src="{{ url('admin_assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('admin_assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>


<script type="text/javascript">

  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      dob: {
        required: true,
      },
      password: {
        required: true,
        minlength: 6,
      },
      
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
     
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

</script>

@endsection