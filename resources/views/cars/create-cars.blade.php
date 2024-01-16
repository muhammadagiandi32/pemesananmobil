@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <form id="form-submit" >
              @csrf
                {{-- <small id="merek" class="form-text text-muted">asda</small> --}}
                <div id="show-errors"></div>
                <div class="form-group">
                    <label>Merek Mobil</label>
                    <input class="form-control" name="merek" type="text" />
                </div>
                <div class="form-group">
                    <label>Model Mobil</label>
                    <input class="form-control" name="model" type="text" />
                </div>
                <div class="form-group">
                    <label>Nomor Polisi</label>
                    <input class="form-control" name="nopol" type="text" />
                </div>
                <div class="form-group">
                    <label>Gambar kendaraan</label>
                    <input class="form-control" name="gambar" type="file" />
                </div>
                <div class="form-group">
                    <label>Biaya sewa perhari (harga)</label>
                    <input class="form-control" name="harga" type="text" />
                </div>
                {{--
                <div class="form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1"
                    />
                    <label class="form-check-label" for="exampleCheck1"
                        >Check me out</label
                    >
                </div>
                --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script type="module">
    // window.onload = function() {
    // }
    $("#form-submit").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.
      $.ajax({
          type: "POST",
          url: `{{ route('cars.store') }}`,
          enctype: 'multipart/form-data',
          data: new FormData(this),
          processData: false,
          contentType: false,
          beforeSend: function() {
            Swal.fire({
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false
            })
            Swal.showLoading();
          },
          success: function(data)
          {
            $('#form-submit')[0].reset();
            console.log(data); // show response from the php script.
              Swal.close()
          },
          error:function(error){
            console.log(error); 
              Swal.close()
            var errors = $('#show-errors');
            $.each(error.responseJSON.errors, function(key, value) {   
                errors.html(`<small id="merek" class="form-text text-danger">`+value+`</small>`); 
            });
              $('#show-errors').append(errors)
          }
      });
      
  });
</script>
@endsection
