<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.main')




@section('content')
    <hr>
    {{-- 
    <div>
        <h2 align="center">Szakik</h2>
    </div>
    <div align="right"><a href="create"><button class="btn btn-warning">Új szaki hozzáadása</button></a></div>
    <div style="display: block; margin:0 auto">
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Név</th>
                <th>Email</th>
                <th>Telefonszám</th>
                <th>Műveletek</th>
            </tr>
            @foreach ($employee as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="profile/{{ $item->id }}" class="mr-3" title="Megtekint" data-toggle="tooltip"><span
                                class="fa fa-eye"></span></a>
                        <a href="/insert/{{ $item->id }}" class="mr-3" title="Módosít" data-toggle="tooltip"><span
                                class="fa fa-pencil"></span></a>
                        <a href="{{ route('employee.delete', $item->id) }}" title="Törlés" data-toggle="tooltip"><span
                                class="fa fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach


        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Szakmák</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Szakma</th>

            </tr>
            @foreach ($field as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->field }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Megyék</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Megye</th>

            </tr>
            @foreach ($county as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->county }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Városok</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Város</th>

            </tr>
            @foreach ($city as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->city }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Szakma-szaki</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Szakma_id</th>
                <th>Szaki_id</th>


            </tr>
            @foreach ($field_employee as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->field_id }}</td>
                    <td>{{ $item->employee_id }}</td>
                </tr>
            @endforeach
        </table>
    </div>


    <hr>
    --}}
    <div style="display: block; margin:0 auto">
        <h2 align="center">Zsoltinak speciálba</h2>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Keresés név alapján..." title="Type in a name">
        <div align="right"><a href="create"><button class="btn btn-warning">Új szaki hozzáadása</button></a></div>
        <table class="table table-striped table-dark " id="myTable">
            <tr>
                <th>ID</th>

                <th>Név</th>
                <th>Megye</th>
                <th>Város</th>
                <th>Szakma</th>
                <th>|Műveletek|</th>
                <th>|Sorok|</th>


            </tr>
            @foreach ($newview as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->county }}</td>
                    <td>{{ $item->city }}</td>
                    <td>{{ $item->field }}</td>
                    <td>
                        <a href="/profile/{{ $item->id }}" class="mr-3" title="Megtekint" data-toggle="tooltip"><span
                                class="fa fa-eye"></span></a>
                        <a href="/insert/{{ $item->id }}/{{ $item->other }}" class="mr-3" title="Módosít"
                            data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                        <a href="{{ route('employee.delete', $item->id) }}" title="Törlés" data-toggle="tooltip"><span
                                class="fa fa-trash"></span></a>
                    </td>
                    <td>{{ $item->other }} <a href="/admin/{{ $item->id }}/{{ $item->other }}/delete"
                            title="Sor törlése" data-toggle="tooltip"><span class="fa fa-trash"></span></a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
    <script>
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1] ;
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
