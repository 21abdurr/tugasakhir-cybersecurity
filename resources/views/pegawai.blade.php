<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>CRUD</title>
    </head>
    <body>
        <h1 class="text-center mb-4 mt-2">Data Pegawai</h1>
        <div class="container">
            <a href="/tambahpegawai" class="btn btn-success">Tambah Data +</a>
            
            <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                    <form action="/pegawai" method="GET">
                    <input type="search" id="searching" name="search" class="form-control">
                    {{-- <button type="submit" class="btn btn-primary ">cari data</button> --}}
                </form>
                </div>
                <div class="col-auto">
                    <a href="/exportpdf" class="btn btn-info">Export To PDF</a>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No telepon</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$loop -> iteration}}</th>
                            <td>{{$item->nama}}</td>
                            <td>
                                <img
                                    src="{{asset('foto/'.$item->foto)}}"
                                    class="img-thumbnail"
                                    alt=""
                                    style="width: 40px"
                                />
                            </td>
                            <td>{{$item->jeniskelamin}}</td>
                            <td>{{$item->notelpon}}</td>
                            <td>{{$item->created_at->diffforhumans()}}</td>
                            <td>
                                <a
                                    href="/tampilkandata/{{$item->id}}"
                                    class="btn btn-primary"
                                    >Edit</a
                                >
                                <a
                                    href="#"
                                    class="btn btn-danger haps"
                                    data-id="{{$item->id}}"
                                    data-nama="{{$item->nama}}"
                                    >Hapus</a
                                >
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(".haps").click(function () {
                let pegawaiid = $(this).attr('data-id');
                let pegawainama = $(this).attr("data-nama");
                swal({
                  title: "Yakin?",
                  text: "Anda Akan menghapus "+pegawainama+" ",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    window.location = "/hapus/"+pegawaiid+""
                    swal("Data Berhasil dihapus", {
                      icon: "success",
                    });
                  } else {
                    swal("Ok, Data Tidak Jadi Dihapus");
                  }
                });
            });
        </script>
        <script>
            @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
            @endif
        </script>
    </body>
</html>
