<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Ajax L8</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1>Crud Jquery Ajax8</h1>
                <button class="btn btn-primary" onclick="create()">+Tambah Product</button>
                <div id="read" class="mt-3"></div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    {{-- jquery --}}
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


    <script>
        $(document).ready(function() {
            read()
        });


        // read data(tampil)
        function read() {
            $.get("{{ url('read') }}", {}, function(data, status) {

                $("#read").html(data);

            });
        }

        // untuk modal create
        function create() {
            $.get("{{ url('create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html("Create Product")
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        // untuk modal Edit show
        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html("Edit Product")
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        // untuk Proses create data
        function store() {

            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });

        }

        // untuk proses edit data
        function update(id) {

            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/" + id,
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });

        }

        // untuk proses delete
        function destroy(id) {

            var name = $("#name").val();
            if (confirm("apakah anda ingin hapus data?") == true) {
                $.ajax({
                    type: "get",
                    url: "{{ url('destroy') }}/" + id,
                    data: "name=" + name,
                    success: function(data) {
                        $(".btn-close").click();
                        read()
                    }
                });
            } else {
                return false;
            }


        }




        function edit(id) {

            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{ url('edit') }}/" + id,
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });

        }
    </script>


</body>

</html>
