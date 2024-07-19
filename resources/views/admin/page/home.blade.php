@extends('layout.admin')

@section('content')

<div class="container-fluid">
    <!--  Row 1 -->

    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">

                        <form class="mb-3 mb-sm-0 d-flex align-items-center gap-2" autocomplete="off">
                            @csrf
                            <div class="">
                                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                            </div>
                            <div>
                                <input type="button" value="Lọc kết quả" class="btn btn-primary"
                                    id="btn-dashboard-filter">
                            </div>
                            <div class="">
                                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                            </div>

                            <div>

                                <select class="form-select dashboard-filter">
                                    <option value="7">Chọn thời gian</option>
                                    <option value="7">7 ngày trước</option>
                                    <option value="30">30 ngày trước</option>
                                    <option value="90">90 ngày trước</option>
                                </select>
                            </div>


                        </form>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Tăng trưởng so với năm trước</h5>
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-semibold mb-3 format-currency">10000đ</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        {{-- @if ($percentageChangeYear > 0)
                                            <span
                                                class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-up-left text-success"></i>
                                            </span>
                                        @else --}}
                                            <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span>
                                        {{-- @endif --}}

                                        <p class="text-dark me-1 fs-3 mb-0">66%</p>
                                        <p class="fs-3 mb-0">năm trước</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        {{-- @foreach ($revenues->sortByDesc('year')->take(2) as $index => $revenue)
                                            <div class="me-4">
                                                <span
                                                    class="round-8 {{ $index === 0 ? 'bg-primary' : 'bg-light-primary' }} rounded-circle me-2 d-inline-block"></span>
                                                <span class="fs-2">{{ $revenue->year }}</span>
                                            </div>
                                        @endforeach --}}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="breakup"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Monthly Earnings -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-9 fw-semibold"> Tăng trưởng các tháng trong năm </h5>
                                    <h4 class="fw-semibold mb-3 format-currency">2000đ</h4>
                                    <div class="d-flex align-items-center pb-1">
                                        {{-- @if ($percentageChangeMonth > 0)
                                            <span
                                                class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-up-left text-success"></i>
                                            </span>
                                        @else --}}
                                            <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span>
                                        {{-- @endif --}}
                                        <p class="text-dark me-1 fs-3 mb-0">555%</p>
                                        <p class="fs-3 mb-0">tháng trước</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-currency-dollar fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Sản phẩm có nhiều lượt xem nhất</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">STT</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Tên sản phẩm</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Lượt xem</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Giá sản phẩm</h6>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $stt = 1;
                                @endphp --}}
                                {{-- @foreach ($topViewProducts as $product) --}}
                                    <tr>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <p class="mb-0 fw-normal">
                                                
                                            </p>
                                        </td>

                                        <td class="border-bottom-0 text-center">
                                            <span
                                                class="badge bg-secondary rounded-3 fw-semibold"></span>
                                        </td>

                                        <td class="border-bottom-0 text-center">
                                            <p class="mb-0 fw-normal"> <span
                                                    class="format-currency">5555đ</span><del
                                                    style="font-size: 12px"><span
                                                        class="format-currency">5555đ</span></del></p>
                                        </td>

                                    </tr>
                                    {{-- @php
                                        $stt++;
                                    @endphp
                                @endforeach --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card overflow-hidden">
                <div class="card-body p-4">
                    <div id="categories"></div>
                </div>
            </div>
            <div class="card overflow-hidden">
                <div class="card-body p-4">
                    <div id="brands"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <h3 class="text-center mb-4" style="text-decoration: underline;text-transform: uppercase">Sản phẩm lượt bán <span class="text-danger" style="font-weight: 600">cao nhất</span></h3>
        {{-- @foreach ($topSellingProductDetails as $itemProduct) --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                        <a href=""><img style="height: 350px"
                                src=""
                                class="card-img-top rounded-0" alt="..."></a>

                        <a href=""
                            class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                                class="ti ti-basket fs-4"></i></a>
                    </div>
                    <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4"></h6>
                        <div class="">
                            <h6 class="fw-semibold fs-4 mb-0"> <span
                                    class="format-currency">đ</span>
                                <del><span class="format-currency">đ</span></del>
                            </h6>
                            <ul class="list-unstyled d-flex align-items-center mb-0">
                                <li><a class="me-1" href="javascript:void(0)">Đã bán: </a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        {{-- @endforeach --}}


    </div>


    {{-- <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
                href="https://themewagon.com">ThemeWagon</a></p>
    </div> --}}
</div>

@endsection