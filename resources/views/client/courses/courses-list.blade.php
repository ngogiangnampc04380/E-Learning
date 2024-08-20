@extends('client.layout.master')
@section('content')
    <div class="breadcrumb-bar">
        <div class="container">
        </div>
    </div>
    <section class="course-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">

                    <div class="showing-list">
                        <div class="row">
                            <div class="col-lg-6">
                                @if (auth()->check())
                                    @if (auth()->user()->role == 1)
                                        <a href="/admin/courses" class="btn btn-secondary"><i class="fa-solid fa-gear"></i>
                                            Quản lí khóa học</a>
                                    @endif
                                @endif

                            </div>
                            <div class="col-lg-6">
                                <div class="show-filter add-course-info">
                                    <form action="{{ route('client.course-lists') }}" method="GET">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-item d-flex">
                                                <div class="search-group">
                                                    <input type="text" name="query" class="form-control"
                                                        style="width:420px;"
                                                        placeholder="Tìm kiếm khóa học trực tuyến, v.v."
                                                        value="{{ request()->query('query') }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (isset($query))
                            <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>
                        @elseif (isset($mentor))
                            <h2>Khóa học của giảng viên: "{{ $mentor->name }}"</h2>
                        @endif

                        @if ($data->isEmpty())
                            <p>Không tìm thấy khóa học nào.</p>
                        @else
                            @foreach ($data as $item)
                                <div class="col-lg-12 col-md-12 d-flex">
                                    <div class="course-box course-design list-course d-flex">
                                        <div class="product">
                                            <div class="product-img">
                                                <a href="{{ route('client.course-details', $item->id) }}">
                                                    <img src="{{ Storage::url('public/' . $item->thumbnail) }}"
                                                        alt="Thumbnail"
                                                        style="width: 250px; height: 150px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <div class="head-course-title">
                                                    <h2 class="title"><a
                                                            href="{{ route('client.course-details', $item->id) }}">{{ $item->name }}</a>
                                                    </h2>
                                                    <div class="all-btn all-category d-flex align-items-center">
                                                        <a href="{{ route('client.course-checkout', $item->id) }}"
                                                            class="btn btn-primary">Đăng Ký Ngay</a>
                                                    </div>
                                                </div>
                                                <div class="course-info border-bottom-0 pb-0 d-flex align-items-center">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <h3>{{ number_format($item->price) }} VNĐ</h3>
                                                    </div>
                                                </div>
                                                <div class="course-category border-bottom-0 pb-2">
                                                    <span>Danh mục: <strong>{{ $item->category->name }}</strong></span>
                                                </div>

                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                                </div>
                                                <div class="course-group d-flex mb-0">
                                                    <div class="course-group-img d-flex">
                                                        <a
                                                            href="{{ route('client.mentor_detail', $item->mentor->user->id) }}">
                                                            <img src="{{ $item->mentor->user->thumbnail ? Storage::url('assets-client/img/user/' . $item->mentor->user->thumbnail) : 'https://cdn-icons-png.flaticon.com/128/9721/9721084.png' }}"
                                                                class="img-fluid rounded-circle">
                                                        </a>
                                                        <div class="course-name">
                                                            <h4><a
                                                                    href="{{ route('client.mentor_detail', $item->mentor->user->id) }}">{{ $item->mentor->user->name }}</a>
                                                            </h4>
                                                            <p>Giảng viên</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="course-share d-flex align-items-center justify-content-center">
                                                        <a href="#rate"><i class="fa-regular fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>


                    <!-- Pagination Links -->
                    <div class="row">
                        <div class="col-md-12">
                            {{ $data->links('pagination::bootstrap-4') }}
                            <!-- Sử dụng pagination mặc định của Bootstrap 4 -->
                        </div>
                    </div>


                    <!-- Pagination Links -->
                    <div class="row">
                        <div class="col-md-12">
                            {{ $data->links('pagination::bootstrap-4') }}
                        </div>
                    </div>



                    <!-- Pagination Links -->
                    <div class="row">
                        <div class="col-md-12">
                            {{ $data->links('pagination::bootstrap-4') }}
                            <!-- Sử dụng pagination mặc định của Bootstrap 4 -->
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 theiaStickySidebar">
                    <div class="filter-clear">
                        <div class="clear-filter d-flex align-items-center">
                            <h4><i class="feather-filter"></i>Lọc</h4>
                        </div>
                        <div class="card search-filter categories-filter-blk">
                            <div class="card-body">
                                <div class="filter-widget mb-0">

                                    <form method="GET" action="{{ route('client.course-lists') }}">
                                        <div class="filter-widget mb-0">
                                            <div class="categories-head d-flex align-items-center">
                                                <h4>Danh mục khóa học</h4>
                                            </div>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="select-all" name="categories[]"
                                                        value="all"
                                                        {{ in_array('all', $categoryIds) ? 'checked' : '' }}>
                                                    <label for="select-all"> <strong style="font-size: 1.2em;">Tất
                                                            cả</strong></label>
                                                </li>
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <input type="checkbox" id="category{{ $category->id }}"
                                                            name="categories[]" value="{{ $category->id }}"
                                                            {{ in_array($category->id, $categoryIds) ? 'checked' : '' }}>
                                                        <label
                                                            for="category{{ $category->id }}">{{ $category->name }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="sort-filter mt-4">
                                                <h4>Sắp xếp theo giá</h4>
                                                <ul>
                                                    <li>
                                                        <input type="radio" id="sort-asc" name="sort" value="asc"
                                                            {{ request('sort') == 'asc' ? 'checked' : '' }}>
                                                        <label for="sort-asc">Từ thấp đến cao</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="sort-desc" name="sort" value="desc"
                                                            {{ request('sort') == 'desc' ? 'checked' : '' }}>
                                                        <label for="sort-desc">Từ cao đến thấp</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price-filter mt-4">
                                                <h4>Lọc theo giá</h4>
                                                <ul>
                                                    <li>
                                                        <input type="checkbox" id="price0-300" name="price_range[]"
                                                            value="0-300"
                                                            {{ in_array('0-300', $priceRanges) ? 'checked' : '' }}>
                                                        <label for="price0-300">0đ - 300.000đ</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="price300-700" name="price_range[]"
                                                            value="300-700"
                                                            {{ in_array('300-700', $priceRanges) ? 'checked' : '' }}>
                                                        <label for="price300-700">300.000đ - 700.000đ</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="price700-1000" name="price_range[]"
                                                            value="700-1000"
                                                            {{ in_array('700-1000', $priceRanges) ? 'checked' : '' }}>
                                                        <label for="price700-1000">700.000đ - 1.000.000đ</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="price1000-1500" name="price_range[]"
                                                            value="1000-1500"
                                                            {{ in_array('1000-1500', $priceRanges) ? 'checked' : '' }}>
                                                        <label for="price1000-1500">1.000.000đ - 1.500.000đ</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="price1500-2000" name="price_range[]"
                                                            value="1500-2000"
                                                            {{ in_array('1500-2000', $priceRanges) ? 'checked' : '' }}>
                                                        <label for="price1500-2000">1.500.000đ - 2.000.000đ</label>
                                                    </li>
                                                </ul>
                                            </div>



                                            <div class="filter-buttons d-flex justify-content-between mt-4">
                                                <button type="submit" class="button-apdung">Áp dụng</button>
                                                <button type="button" id="clearFilters" class="button-loaibo">Loại
                                                    bỏ</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                        <div class="card post-widget">
                            <div class="card-body">
                                <div class="latest-head">
                                    <h4 class="card-title">Khóa học mới nhất</h4>
                                </div>
                                <ul class="latest-posts">
                                    @foreach ($latestCourses as $course)
                                        <li>
                                            <div class="post-thumb">
                                                <a href="{{ route('client.course-details', $course->id) }}">

                                                    <img src="{{ Storage::url('public/' . $course->thumbnail) }}"
                                                        alt="Thumbnail" class="img-fluid rounded shadow-sm"
                                                        style="max-width: 100px;">

                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a
                                                        href="{{ route('client.course-details', $course->id) }}">{{ $course->name }}</a>
                                                </h4>
                                                <p>{{ $course->price > 0 ? number_format($course->price) . ' VNĐ' : '' }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const categoryCheckboxes = document.querySelectorAll('input[name="categories[]"]:not(#select-all)');
            const clearFiltersButton = document.getElementById('clearFilters');

            // Nút "Loại bỏ" được nhấn
            clearFiltersButton.addEventListener('click', function() {
                // Bỏ chọn tất cả các checkbox
                selectAllCheckbox.checked = false;
                categoryCheckboxes.forEach(checkbox => checkbox.checked = false);
                priceCheckboxes.forEach(checkbox => checkbox.checked = false);
                sortRadios.forEach(radio => radio.checked = false);
            });
            // Khi checkbox "Tất cả" thay đổi
            selectAllCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    // Nếu "Tất cả" được chọn, chọn tất cả các checkbox danh mục
                    categoryCheckboxes.forEach(checkbox => checkbox.checked = true);
                } else {
                    // Nếu "Tất cả" bị bỏ chọn, bỏ chọn tất cả các checkbox danh mục
                    categoryCheckboxes.forEach(checkbox => checkbox.checked = false);
                }
            });

            // Khi bất kỳ checkbox danh mục nào thay đổi
            categoryCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Nếu bất kỳ checkbox danh mục nào bị bỏ chọn, bỏ chọn checkbox "Tất cả"
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    }

                    // Nếu tất cả các checkbox danh mục được chọn, chọn checkbox "Tất cả"
                    const allChecked = Array.from(categoryCheckboxes).every(checkbox => checkbox
                        .checked);
                    if (allChecked) {
                        selectAllCheckbox.checked = true;
                    }
                });
            });

            // Checkbox lọc theo giá
            const priceCheckboxes = document.querySelectorAll('input[name="price_range[]"]');
            priceCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Khi bất kỳ checkbox giá nào thay đổi
                    // Xử lý nếu cần, ví dụ: cập nhật UI hoặc giá trị nếu cần thiết
                });
            });

            // Radio button sắp xếp theo giá
            const sortRadios = document.querySelectorAll('input[name="sort"]');
            sortRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Xử lý khi người dùng thay đổi lựa chọn sắp xếp
                    // Có thể thực hiện các thao tác như cập nhật UI nếu cần thiết
                });
            });
        });
    </script>





@endsection
