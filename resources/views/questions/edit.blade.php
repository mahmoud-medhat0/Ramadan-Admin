@extends('layouts.parent2')
@section('title', 'Edit Attendence Record')
@section('content')
@include('messages.message')
<div class="col-12" bis_skin_checked="1">
    @isset($success1)
    {{ $success1 }}
    @endisset
    <div class="white_card card_height_100 mb_30" bis_skin_checked="1">
        <div class="white_card_body" bis_skin_checked="1">
            <div class="white_box_tittle list_header" bis_skin_checked="1">
                <h4>@yield('title')</h4>
            </div>
            <form action="{{ route('QuestionUpdate') }}" method="post">
                @method('PUT')
                @csrf
                <center>
                    <div class="col-lg-6 flex" bis_skin_checked="1">
                        <label for="question">Type a question</label>
                        <div class="" tabindex="0" bis_skin_checked="1">
                            <input type="text" class="form-control" value="{{ $data['question']->question }}" name="question" id="">
                            @error('question')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </center>
                <center>
                    <div class="create_report_btn mt_30" bis_skin_checked="1">
                        <button class="btn btn-primary my-4"> update </button>
                    </div>
                </center>
            </form>
            <script>
                function myFunction() {
                  var input, filter, table, tr, td, i, txtValue;
                  input = document.getElementById("myInput");
                  filter = input.value.toUpperCase();
                  table = document.getElementById("DataTables_Table_0");
                  tr = table.getElementsByTagName("tr");
                  for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("tr")[0];
                    if (td) {
                      txtValue = td.textContent || td.innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                      } else {
                        tr[i].style.display = "none";
                      }
                    }
                  }
                    th = table.getElementsByTagName("th");
                    for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("th")[0];
                    if (td) {
                      txtValue = td.textContent || td.innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                      } else {
                        tr[i].style.display = "none";
                      }
                    }
                  }
                }
            </script>
            @endsection
