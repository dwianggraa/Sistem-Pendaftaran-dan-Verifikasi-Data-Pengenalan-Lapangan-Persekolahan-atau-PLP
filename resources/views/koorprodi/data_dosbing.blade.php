<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SI PLP</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('../html/css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}" crossorigin="anonymous"></script>
</head>J

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">SI PLP</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>

            </div>
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profil</a></li>
                    <li><a class="dropdown-item" href="#!">Pengaturan</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Koordinator Prodi</div>
                        <a class="nav-link" href="/datamhs">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Form PLP
                        </a>
                        <a class="nav-link" href="/datadosbing">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Dosen Pembimbing
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ auth()->user()->email }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Dosen Pembimbing</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data dosen pembimbing Prodi PTI FILKOM Universitas Brawijaya</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data SMK
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK/NIP</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>NIK/NIP</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    @foreach ($datadosbing as $key => $item)
                                    <tr>
                                        <td>{{ $datadosbing->firstItem() + $key }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['nik'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>{{ $item['telepon'] }}</td>
                                        <td>
                    
                                            <li class="list-inline-item">
                                                <a href="{{ url('/datadosbing/edit', $item->id) }}"
                                                    class="btn btn-success btn-sm rounded-0"
                                                    type="button" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ url('/datadosbing/delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Yakin data dihapus?')"
                                                    type="button" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"  ><i
                                                        class="fa fa-trash"></i></a>

                                            </li>
                                        </td>
                                    </tr>
                                @endforeach                  
                                    <a href="/datadosbing/create"><button type="button" class="btn btn-primary">Tambah Data Dosen Pembimbing</button></a>
                                    <h4></h4>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Sistem Informasi Pengenalan Lingkungan Persekolahan
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </script>
    <script src="../html/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../html/js/datatables-simple-demo.js"></script>
</body>

</html>
