@extends('layouts.app')
@section('content')
            <div class="text-center my-3 p-3 bg-secondary text-white">
                <h3> Product Gallery </h3>
            </div>
            <main id="main">    
                <!-- ======= About Us Section ======= -->
                <section class="page-design bg-light">
                    <div class="container" data-aos="fade-up">
                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <ul class="nav nav-tabs flex-column">
                                    @foreach($categoryWithProducts as $id => $category)
                                        <li class="nav-item mt-2">
                                            <a class="nav-link {{ $id == 0?'active':'' }} show" data-bs-toggle="tab"
                                                data-bs-target="#aboutus{{$id}}">
                                                <h4 class='tab-title'>{{ $category->name}}</h4>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-8">
                                <div class="tab-content">
                                    @foreach($categoryWithProducts as $id => $category)
                                        <div class="tab-pane {{ $id == 0?'active':'' }} show" id="aboutus{{$id}}">
                                            @php
                                                $totalProducts = count($category->product);
                                                $productsPerPage = 6;
                                                $totalPages = ceil($totalProducts / $productsPerPage);
                                                $currentPage = $page
                                            @endphp 
                                            <div class="row">
                                                @foreach (collect($category->product)->slice(($currentPage - 1) * $productsPerPage, $productsPerPage) as $product)
                                                    <div class="col-md-4">
                                                        <div class="card my-2">
                                                            <img class="card-img-top" src="{{$product['image']}}"
                                                                alt="Card image cap">
                                                            <div class="card-body" style="min-height: 200px;">
                                                                <h5 class="card-title"> {{$product['name']}}</h5>
                                                                <p class="card-text"> {{$product['type']}} </p>
                                                                
                                                                <a href="{{route('productDetail', $product['id'])}}"
                                                                    class="btn btn-secondary btn-sm"> More Detail </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <nav>
                                                <ul class="pagination">
                                                  <li class="page-item{{ $currentPage == 1 ? ' disabled' : '' }}">
                                                    <a class="page-link" href="{{ $currentPage == 1 ? '#' : '?page=' . ($currentPage - 1) }}">Previous</a>
                                                  </li>
                                              
                                                  @for ($i = 1; $i <= $totalPages; $i++)
                                                    <li class="page-item{{ $currentPage == $i ? ' active' : '' }}">
                                                      <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                                    </li>
                                                  @endfor
                                              
                                                  <li class="page-item{{ $currentPage == $totalPages ? ' disabled' : '' }}">
                                                    <a class="page-link" href="{{ $currentPage == $totalPages ? '#' : '?page=' . ($currentPage + 1) }}">Next</a>
                                                  </li>
                                                </ul>
                                              </nav>
                                              
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- End About Us Section -->
            </main><!-- End #main -->```
@endsection
