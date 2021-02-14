<table class="table table-bordered table-striped table-condensed flip-content">
    <thead class="flip-content">
    <tr>
        <th> الاسم </th>
        <th class="numeric">الايميل </th>
        <th width="15%">تعديل الصلاحيات</th>
        <th width="5%">حذف</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $row)
        <tr id="row{{$row->id}}">
            <td> {{$row->name}} </td>
            <td>{{$row->email}} </td>
            <td><button data-route="{{$row->id}}" class="btn btn-light-primary d-flex flex-row edit-permission" data-toggle="modal" data-target="#editModal">تعديل الصلاحيات <span class="ml-2 mt-1 fas fa-eye"></span></button></td>
            <td><button class="btn btn-danger delete-row" data-item="{{$row->id}}" ><span class="fa fa-trash"></span></button></td>
        </tr>
    @endforeach
    </tbody>
</table>


