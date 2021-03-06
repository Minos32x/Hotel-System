<?php if (Auth::guard('employee')->user()->id === $model->approved_by || (Auth::guard('employee')->user()->type === 'admin') || (Auth::guard('employee')->user()->type === 'manager') ) {
if ($banned_at != null) {
    $button = 'unBan';
} else {
    $button = 'Ban';
} ?>
<a href="{{ url('clients/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

<button class="delete btn btn-danger" id={{$id}}><i class="fa fa-trash"></i></button>
<button id="blocker{{$id}}" class="btn btn-danger">{{$button}}</button>
<?php
} ?>
<?php if( !$model->approved_by){?>
<button id="approve{{$id}}" class="btn btn-success">Approve</button>
<?php } ?>
<script>
    $('#{{$id}}').click(function () {

        var id = $(this).prop('id');
        if (confirm('are you sure?')) {
            $.ajax({

                url: "{{route('client.delete',$id)}}",
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
        if (confirm("Are Your Sure!!")) {


            if ($(this).html() == 'Ban') {
                $.ajax({
                    url: "{{route('client.ban',$id)}}",
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
                    url:"{{route('client.unban',$id)}}",
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


<script>
    $('#approve{{$id}}').click(function () {
        $.ajax({
            url: 'client/approve/' +{{$id}},
            type: 'get',

            success: function (resp) {
                console.log(resp);

                $('#dataTableBuilder').DataTable().ajax.reload();
            },
            error: function (err) {
                console.log(err);
            }


        })
    })
</script>

