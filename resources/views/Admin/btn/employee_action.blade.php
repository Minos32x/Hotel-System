<?php if (Auth::guard('employee')->user()->id === $model->created_by || (Auth::guard('employee')->user()->type === 'admin')) { ?>
<a href="{{ url('employees/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

<button class="delete btn btn-danger" id={{$id}}><i class="fa fa-trash"></i></button>

<?php

if ($banned_at != null) {
    $button = 'unBan';
} else {
    $button = 'Ban';
} ?>

<?php if( (Auth::guard('employee')->user()->type === 'admin') || (Auth::guard('employee')->user()->id === $model->created_by) ){ ?>
<button id="blocker{{$id}}" class="btn btn-danger">{{$button}}</button>
<?php }?>

<?php } ?>


<script>
    $('#dataTableBuilder').on("click", "#{{$id}}", function () {
        var id = $(this).prop('id');
        if (confirm('are you sure?')) {
            $.ajax({

                url: 'employees/' + id,
                type: 'DELETE',
                datatype: 'JSON',
                data: {
                    'id': id,
                    '_method': 'DELETE',
                    '_token': '{{ csrf_token() }}'

                },
                success: function () {


                    $('#dataTableBuilder').DataTable().ajax.reload();
                }

            })

        }
    })
</script>

<script>
    $('#blocker{{$id}}').on("click", function () {
if(confirm("Are Your Sure!!")) {

    if ($(this).html() == 'Ban') {
        $.ajax({
            url: 'employee/blocking/ban/' +{{$id}},
            type: 'get',

            success: function (resp) {
                console.log(resp);

                $('#dataTableBuilder').DataTable().ajax.reload();
            },
            error: function (err) {
                console.log(err);
            }

        })
    }

    else {
        $.ajax({
            url: 'employee/blocking/unban/' +{{$id}},
            type: 'get',
            success: function () {
                $('#dataTableBuilder').DataTable().ajax.reload();
            },
            error: function (err) {
                alert(err.data);
            }

        })

    }
}
    })
</script>
