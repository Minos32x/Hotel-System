<?php if (Auth::guard('employee')->user()->id === $model->approved_by || (Auth::guard('employee')->user()->type === 'admin')) { ?>
<a href="{{ url('client/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

<button class="delete btn btn-danger" id={{$id}}><i class="fa fa-trash"></i></button>
<?php } ?>



<?php
if ($banned_at != null) {
    $button = 'unBan';
} else {
    $button = 'Ban';
} ?>

<?php if( (Auth::guard('employee')->user()->type === 'admin') || (Auth::guard('employee')->user()->id === $model->created_by) ){ ?>
<button id="blocker{{$id}}" class="btn btn-danger">{{$button}}</button>
<?php }?>


<script>
    $('#dataTableBuilder').on("click", "#{{$id}}", function () {

        var id = $(this).prop('id');
        if (confirm('are you sure?')) {
            $.ajax({

                url: 'clients/' + id,
                type: 'DELETE',
                datatype: 'JSON',
                data: {
                    'id': id,
                    '_method': 'DELETE',
                    '_token': '{{ csrf_token() }}'

                },
                success: function () {


                    window.location.reload();
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
                    url: 'client/ban/' +{{$id}},
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
                    url: 'client/unban/' +{{$id}},
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

