<table class="table">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th width="20%">الاسم</th>
        <th width="20%">المنطقة</th>
        <th width="5%">عرض الشجرة</th>
        <th width="5%">اضافة ابن</th>
        <th width="5%">تعديل</th>
        <th width="5%">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0;?>
    @foreach($persons as $item)
    <tr>
        <th scope="row">{{++$i}}</th>

        <td>{{$item->first_name}} {{$item->family_name}}</td>
        <td>{{$item->region}}</td>
        <td>
            <button class="btn btn-info show-tree" data-route="{{$item->id}}" style="border-radius: 50%;box-sizing: border-box;">
                <span class="flaticon-eye"></span>
            </button>

        </td>
        <td>
            <button class="btn btn-info add-son" data-route="{{$item->id}}" style="border-radius: 50%;box-sizing: border-box;">
                <span class="flaticon2-add"></span>
            </button>

        </td>

        <td>
            <button class="btn btn-primary update-person" data-route="{{$item->id}}" style="border-radius: 50%;box-sizing: border-box;">
                <span class="flaticon2-pen"></span>
            </button>
        </td>
        <td>
            <button class="btn btn-danger delete-person" data-route="{{$item->id}}" style="border-radius: 50%;box-sizing: border-box;">
                <span class="flaticon2-trash"></span>
            </button>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
{{$persons->links()}}
