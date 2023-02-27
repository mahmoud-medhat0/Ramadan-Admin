@extends('layouts.parent2')
@section('title', 'Answers Question Record')
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
                <div class="box_right d-flex lms_block" bis_skin_checked="1">
                    <div class="serach_field_2" bis_skin_checked="1">
                        <div class="search_inner" bis_skin_checked="1">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for id.."
                                title="Type id">
                        </div>
                    </div>
                </div>
            </div>
            <center>
                {{ $data['question'] }}
            </center>
            <table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid"
                aria-describedby="DataTables_Table_0_info" style="width: 500px;">
                <thead>
                    <tr role="row">
                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 74px;" aria-sort="ascending"
                            aria-label="id: activate to sort column descending">id</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 74px;" aria-label="User: activate to sort column ascending">
                            name</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 74px;" aria-label="User: activate to sort column ascending">
                            number</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 74px;" aria-label="User: activate to sort column ascending">
                            address</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 74px;" aria-label="User: activate to sort column ascending">
                            answer</th>
                        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" style="width: 74px;" aria-label="User: activate to sort column ascending">
                            created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['Record'] as $answer)
                    <tr role="row" class="odd">
                        <th scope="row" tabindex="0" class="sorting_1">
                            {{ $answer->id }}
                        </th>
                        <td>{{ $answer->name }}</td>
                        <td>{{ $answer->number }}</td>
                        <td>{{ $answer->address }}</td>
                        <td>{{ $answer->answer }}</td>
                        <td>{{ $answer->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
