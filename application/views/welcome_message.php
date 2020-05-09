<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <title>CodeIgniter</title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">CodeIgniter</h1>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary m-4" data-toggle="modal"
                    data-target="#exampleModal">
                    Add Data
                </button>

                <!-- Insert Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" id="form">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" id="add" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                    aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModal">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" id="form_edit">
									<input type="text" hidden id="edit_modal_id" value="">
                                    <div class="form-group">
                                        <label for="edit_name">Name</label>
                                        <input type="text" class="form-control" id="edit_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_email">Email address</label>
                                        <input type="text" class="form-control" id="edit_email">
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" id="update" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal Tutap -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    // Add Open
    $(document).on('click', '#add', (e) => {
        e.preventDefault();
        const name = $('#name').val()
        const email = $('#email').val()
        fetch();

        $.ajax({
            url: "<?= base_url() ?>insert",
            dataType: "json",
            type: "post",
            data: {
                name: name,
                email: email
            },
            success: (data) => {
                fetch();
                $("#exampleModal").modal('hide');
                if (data.response == "success") {
                    toastr["success"](data.message)
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                } else {
                    toastr["error"](data.message)
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }

            }
        })

        $("#form")[0].reset();

    })
    // Add Close



    // Fetch  Open
    function fetch() {
        $.ajax({
            url: "<?= base_url(); ?>fetch",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                var tbody = "";
                for (var key in data) {
                    tbody += "<tr>"
                    tbody += "<td>" + data[key]["id"] + "</td>"
                    tbody += "<td>" + data[key]["name"] + "</td>"
                    tbody += "<td>" + data[key]["email"] + "</td>"
                    tbody +=
							`<td> 
								<a href="#" id="delete" value="${data[key]["id"]}">Delete</a>
								<a href="#" id="edit" value="${data[key]["id"]}">Edit</a>
							</td>`
                    tbody += "</tr>"
                }

                $("#tbody").html(tbody);

            }
        })
    }
    fetch();
    // Fetch Close


    // Delete Open
    $(document).on("click", "#delete", (e) => {
        e.preventDefault();
        var del_id = $(e.target).attr("value");

        if (del_id == "") {
            alert("Delete Id Required");
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ',
                    cancelButton: 'btn btn-danger mr-3'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    // Ajax Delete
                    $.ajax({
                        url: '<?= base_url(); ?>delete',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            del_id: del_id
                        },
                        success: function(data) {
                            fetch();
                            console.log(data);
                        }
                    });

                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )


                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }

    })
    // Delete Close



    // Edit  Open
    $(document).on("click", "#edit", (e) => {
        e.preventDefault();
        var edit_id = $(e.target).attr("value");
        if (edit_id == "") {
            alert("Edit ID is required");
        } else {

            // Menampilkan Data Edit
            $.ajax({
                url: "<?= base_url(); ?>edit",
                type: "post",
                dataType: "json",
                data: {
                    edit_id: edit_id
                },
                success: function(data) {
                    if (data.response == "success") {
						$('#editModal').modal("show");
						$('#edit_modal_id').val(data.post.id);
						$('#edit_name').val(data.post.name);
						$('#edit_email').val(data.post.email);
                    } else {
						toastr["error"](data.message)
                    	toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": false,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
                    	}
                    }
                }
            })

        }

    })
	// Edit Close


	// Update Open
	$(document).on("click", "#update", (e) => {
		e.preventDefault();
        var edit_id = $("#edit_modal_id").val();
        var edit_name = $("#edit_name").val();
        var edit_email = $("#edit_email").val();

		if(edit_id == "" || edit_name == "" || edit_email == ""){
			alert("Both field are empty")
		}else{

				$.ajax({
					url : "<?= base_url(); ?>update",
					type : "post",
					dataType:"json",
					data : {
						edit_id : edit_id,
						edit_name : edit_name,
						edit_email: edit_email
					},
					success : function(data) {
						fetch();
						if(data.response == "success"){
							$("#editModal").modal('hide');
							toastr["success"](data.message)
							toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": true,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							}
						}else{
							toastr["error"](data.message)
							toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": true,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							}
						}
					}

				})
		
		}

	})

    </script>
</body>

</html>