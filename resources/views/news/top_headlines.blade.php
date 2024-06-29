<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>TechPay News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background: #f8f8f8
        }

        .avatar--md .avatar__content img {
            width: 100px;
            height: 80px;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="mb-4">
                    <div class="small mb-3">Search</div>
                    <div class="input-group">
                        <input id="search-input" placeholder="Search for latest News..." type="text"
                            class="form-control">
                        <div class="input-group-append">
                            <button id="search-button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="small mb-3">Favorites</div>
                    <ul class="nav flex-column nav-pills">
                        <li class="nav-item"><a href="#" class="nav-link active"><i
                                    class="fa fa-fw fa-line-chart mr-2"></i>Overview</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i
                                    class="fa fa-fw fa-calendar-o mr-2"></i>Calendar</a></li>
                    </ul>
                </div>
                <div class="mb-4">
                    <div class="small mb-3">Breaking News</div>
                    <ul class="nav flex-column nav-pills" id="breaking-news-list">
                        {{-- TopHeadlines --}}
                    </ul>
                </div>

                <div class="mb-4">
                    <div class="small mb-3">Authors</div>
                    <ul class="nav flex-column nav-pills">
                        <li class="nav-item">
                            <a href="#" class="d-flex nav-link">
                                <div class="media">
                                    <div class="mr-3 align-self-center media-left media-middle">
                                        <div class="avatar-image avatar-image--loaded">
                                            <div class="avatar avatar--md avatar-image__image">
                                                <div class="avatar__content"><img
                                                        src="https://bootdey.com/img/Content/avatar/avatar1.png"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="mt-0">Harvey Blick</div><span class="small">Pennsylvania,
                                            SD</span>
                                    </div>
                                </div><i class="fa fa-fw fa-circle text-success ml-auto align-self-center ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="d-flex nav-link">
                                <div class="media">
                                    <div class="mr-3 align-self-center media-left media-middle">
                                        <div class="avatar-image avatar-image--loaded">
                                            <div class="avatar avatar--md avatar-image__image">
                                                <div class="avatar__content"><img
                                                        src="https://bootdey.com/img/Content/avatar/avatar2.png"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="mt-0">Hobart Hintz</div><span class="small">North Carolina,
                                            CT</span>
                                    </div>
                                </div><i class="fa fa-fw fa-circle text-warning ml-auto align-self-center ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="d-flex nav-link">
                                <div class="media">
                                    <div class="mr-3 align-self-center media-left media-middle">
                                        <div class="avatar-image avatar-image--loaded">
                                            <div class="avatar avatar--md avatar-image__image">
                                                <div class="avatar__content"><img
                                                        src="https://bootdey.com/img/Content/avatar/avatar3.png"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="mt-0">Elmore Cummerata</div><span class="small">Michigan,
                                            NC</span>
                                    </div>
                                </div><i class="fa fa-fw fa-circle text-danger ml-auto align-self-center ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-fw fa-plus mr-2"></i>Add
                                New People</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="d-flex flex-column flex-md-row mb-3 mb-md-0">
                    <nav class="mr-auto d-flex align-items-center" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="active breadcrumb-item" aria-current="page"><a href="/"><i
                                        class="fa fa-home"></i></a></li>
                            <li class="active breadcrumb-item" aria-current="page">News Headlines</li>
                        </ol>
                    </nav>
                    <div role="toolbar" class="btn-toolbar">
                        <div role="group" class="mr-auto mr-md-2 btn-group"><a
                                class="align-self-center btn btn-secondary active" aria-current="page"
                                id="tooltipShowList" href="#"><i class="fa-fw fa fa-bars"></i></a><a
                                class="align-self-center btn btn-secondary" id="tooltipShowGrid" href="#"><i
                                    class="fa-fw fa fa-th-large"></i></a></div>
                        <div role="group" class="btn-group">
                            <button id="tooltipAddNew" class="align-self-center btn btn-primary"><i
                                    class="fa-fw fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3 Card_custom-card--border_5wJKy card">
                    <div class="table-responsive-xl">
                        <div id="loader" style="display: none; text-align: center; margin-top: 20px;">
                            <img src="{{ asset('img/Fidget-spinner.gif') }}" alt="Loading...">
                        </div>

                        <table class="mb-0 table table-hover">
                            <thead>
                                <tr>
                                    <th class="align-middle bt-0">Star</th>
                                    <th class="align-middle bt-0">News</th>
                                    <th class="align-middle bt-0">Date</th>
                                </tr>
                            </thead>
                            <tbody id="news-table-body">
                                @foreach ($news['articles'] as $article)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="text-inverse"><a href="#"><i
                                                        class="fa fa-fw fa-lg fa-star-o"></i></a></div>
                                        </td>
                                        <td class="align-middle">
                                            <div><a href="{{ $article['url'] }}"
                                                    target="_blank">{{ $article['title'] }}</a></div>
                                            <span>Last Edited by:
                                                {{ $article['author'] ?? 'Unknown' }}<br>{{ \Carbon\Carbon::parse($article['publishedAt'])->format('l, d F, Y') }}</span>
                                        </td>
                                        <td class="align-middle"><span
                                                class="badge badge-success badge-pill">{{ \Carbon\Carbon::parse($article['publishedAt'])->format('l, d F, Y') }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="avatar-image avatar-image--loaded">
                                                <div class="avatar avatar--md avatar-image__image">
                                                    <div class="avatar__content">
                                                        <img src="{{ $article['urlToImage'] ?? 'https://bootdey.com/img/Content/avatar/avatar1.png' }}"
                                                            alt="Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-right">
                                            <div class="btn-group">
                                                <button type="button" aria-haspopup="true" aria-expanded="false"
                                                    class="dropdown-toggle btn btn-link"><i
                                                        class="fa fa-gear"></i></button>
                                                <div tabindex="-1" role="menu" aria-hidden="true"
                                                    class="dropdown-menu dropdown-menu-right">
                                                    <button type="button" tabindex="0" class="dropdown-item"><i
                                                            class="fa fa-fw fa-folder-open mr-2"></i>View</button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i
                                                            class="fa fa-fw fa-ticket mr-2"></i>Add Task</button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i
                                                            class="fa fa-fw fa-paperclip mr-2"></i>Add Files</button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i
                                                            class="fa fa-fw fa-trash mr-2"></i>Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center pb-0 card-footer">
                    <nav class aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a href="#" class="page-link" aria-label="Previous"><span
                                        aria-hidden="true"><i class="fa fa-fw fa-angle-left"></i></span><span
                                        class="sr-only">Previous</span></a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link" aria-label="Next"><span
                                        aria-hidden="true"><i class="fa fa-fw fa-angle-right"></i></span><span
                                        class="sr-only">Next</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        document.getElementById('search-button').addEventListener('click', function() {
            const query = document.getElementById('search-input').value;

            // Show the loader
            document.getElementById('loader').style.display = 'block';

            // Add a delay before starting the search
            setTimeout(() => {
                fetch(`/search-news?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const newsTableBody = document.getElementById('news-table-body');
                        newsTableBody.innerHTML = '';

                        data.articles.forEach(article => {
                            const row = document.createElement('tr');

                            row.innerHTML = `
                                <td class="align-middle">
                                    <div class="text-inverse"><a href="#"><i class="fa fa-fw fa-lg fa-star-o"></i></a></div>
                                </td>
                                <td class="align-middle">
                                    <div><a href="${article.url}" target="_blank">${article.title}</a></div>
                                    <span>Last Edited by: ${article.author ?? 'Unknown'}<br>${new Date(article.publishedAt).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</span>
                                </td>
                                <td class="align-middle"><span class="badge badge-success badge-pill">${new Date(article.publishedAt).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</span></td>
                                <td class="align-middle">
                                    <div class="avatar-image avatar-image--loaded">
                                        <div class="avatar avatar--md avatar-image__image">
                                            <div class="avatar__content">
                                                <img src="${article.urlToImage ?? 'https://bootdey.com/img/Content/avatar/avatar1.png'}" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-right">
                                    <div class="btn-group">
                                        <button type="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-link"><i class="fa fa-gear"></i></button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="fa fa-fw fa-folder-open mr-2"></i>View</button>
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="fa fa-fw fa-ticket mr-2"></i>Add Task</button>
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="fa fa-fw fa-paperclip mr-2"></i>Add Files</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="fa fa-fw fa-trash mr-2"></i>Delete</button>
                                        </div>
                                    </div>
                                </td>
                            `;

                            newsTableBody.appendChild(row);
                        });


                        document.getElementById('loader').style.display = 'none';
                    })
                    .catch(error => {
                        console.error('Error fetching news:', error);


                        document.getElementById('loader').style.display = 'none';
                    });
            }, 1000);
        });
    </script>
    <script>
        var topHeadlines = <?php echo json_encode($news); ?>;

        $(document).ready(function() {
            var $breakingNewsList = $('#breaking-news-list');

            for (var i = 0; i < 4 && i < topHeadlines.articles.length; i++) {
                var article = topHeadlines.articles[i];
                var listItem = '<li class="nav-item">' +
                    '<a href="' + article.url + '" class="d-flex nav-link">' +
                    '<i class="fa fa-fw fa-star-o align-self-center mr-2"></i>' +
                    article.title +
                    '<span class="ml-auto align-self-center badge badge-secondary badge-pill">' +

                    '</span>' +
                    '</a>' +
                    '</li>';

                $breakingNewsList.append(listItem);
            }
        });
    </script>


</body>

</html>
