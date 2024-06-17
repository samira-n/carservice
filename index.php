<?php
session_start();
include 'php/config.php';

// Получаем имя пользователя из сессии, если пользователь аутентифицирован
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT username FROM users WHERE id = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    } else {
        $username = "Пользователь";
    }
} else {
    $username = "Гость";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ММК Автосервис</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid border-bottom d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Офис</h6>
                        <span>Балашихинское ш., 10А, Балашиха</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Почта</h6>
                        <span>daniilfedoseev2999@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Связаться с нами</h6>
                        <span>+79017091185</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><img class="flaticon-cat display-1 text-primary me-4" src="img/логотип.png" height="60px">ММК Автосервис</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Главная</a>
                <a href="product.php" class="nav-item nav-link">Запчасти</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="view_cart.php" class="nav-item nav-link">Корзина</a>
                        <a href="php/logout.php" class="nav-item nav-link">Выйти</a>
                        <p class="nav-item nav-user"><?php echo $username; ?></p>
                    <?php else: ?>
                        <a href="login.html" class="nav-item nav-link">Войти</a><br>
                    <?php endif; ?>
                <a href="contact.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Связаться с нами <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-uppercase mb-lg-4" id="header">ММК Автосервис</h1>
                    <h1 class="text-uppercase text-white mb-lg-4">Сделай свой автомобиль лучше</h1>
                    <p class="fs-4 text-white mb-lg-4">Что может быть лучше чем ваше счастье и отличное состояние вашего автомобиля?! Правильно, ничего. Именно поэтому мы и заботимся о качесвте нашей работы и запчастей.</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <section id="about">
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">О НАС</h6>
                        <h1 class="display-5 text-uppercase mb-0">МЫ ПОСТОЯННО ЗАБОТИМСЯ О КАЧЕСТВЕ ЗАПЧАСТЕЙ И ОБСЛУЖИВАНИЯ КЛИЕНТСКИХ АВТО, ЧТОБЫ ВЫ БЫЛИ СЧАСТЛИВЫ!</h1>
                    </div>
                 
                    <div class="bg-light p-4">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                    aria-selected="true">Наша миссия</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                    aria-selected="false">Наше видение</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                <p class="mb-0">Мисиия нашей компании заключается в том, что мы продаем только лучшие из лучших товаров. Все для ваших автомобилей, все для вашего счастья!</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                <p class="mb-0">Не всегда запчасти, которые мы покупаем для своих автомобилей, удволетворяют нашим требованиям. Много брака и поломок, ноль качества. По нашему мнению, автомобили должны обслуживаться хорошего качества запчастями, которые мы и предоставляем!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <!-- About End -->
    

    <!-- Services Start -->
    <section id="service">
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Сервис</h6>
                <h1 class="display-5 text-uppercase mb-0">Наши услуги</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img class="flaticon-cat display-1 text-primary me-4" src="img/грузовик.png" width="75px"></img>
                        <div>
                            <h5 class="text-uppercase mb-3">Доставка автозапчастей</h5>
                            <p>Подберем лучшие запчасти для вашего автомобиля</p>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img class="flaticon-cat display-1 text-primary me-4" src="img/гаечный ключ.png" width="75px"></img>
                        <div>
                            <h5 class="text-uppercase mb-3">Ремонт автомобилей</h5>
                            <p>Диагностируем проблему и устраним ее</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img class="flaticon-cat display-1 text-primary me-4" src="img/колесо.png" width="75px"></img>
                        <div>
                            <h5 class="text-uppercase mb-3">Шиномонтаж</h5>
                            <p>Поставим колеса любого размера и любой сложности</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img class="flaticon-cat display-1 text-primary me-4" src="img/бинокль.png" width="75px" height="70px"></img>
                        <div>
                            <h5 class="text-uppercase mb-3">Свободное наблюдение за процессом</h5>
                            <p>Вы можете спокойно приезжать и наблюдать как происходит рабочий процесс</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img class="flaticon-cat display-1 text-primary me-4" src="img/рукопожатие.png" width="75px"></img>
                        <div>
                            <h5 class="text-uppercase mb-3">Рекомендации</h5>
                            <p>Рекомендации механиков по уходу за вашим автомобилем</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Services End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Запчасти</h6>
                <h1 class="display-5 text-uppercase mb-0">Запчасти для вашего железного друга</h1>
            </div>
            <div class="owl-carousel product-carousel">
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="img/катализатор.png" alt="">
                        <h6 class="text-uppercase">Катализаторы</h6>
                        <h5 class="text-primary mb-0">1500 рублей</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="product.php"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="img/шины.png" alt="">
                        <h6 class="text-uppercase">Шины</h6>
                        <h5 class="text-primary mb-0">3000 рублей</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="product.php"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="img/диск.png" alt="">
                        <h6 class="text-uppercase">Тормозные диски</h6>
                        <h5 class="text-primary mb-0">4000 рублей</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="product.php"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="img/двигатель.png" alt="">
                        <h6 class="text-uppercase">Двигатели</h6>
                        <h5 class="text-primary mb-0">от 60000 рублей</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="product.php"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="img/пружины.png" alt="">
                        <h6 class="text-uppercase">Пружины</h6>
                        <h5 class="text-primary mb-0">2000 рублей за 2шт</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="product.php" ><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Услуги</h6>
                <h1 class="display-5 text-uppercase mb-0">Цены на популярные услуги автосервиса</h1>
                <p class="">Мы дорожим своей репутацией и делаем все качественно и с душой</p>
            </div>
        </div>
        <div class="uslugi">
                <div class="info">
                    <div class="diag_container">
                        <div class="diagnostic">
                                <h2>Диагностика</h2>
                        </div>
                        <p>Диагностика ходовой - 700₽</p>
                        <p>Инструментальная диагностика - 2500₽</p>
                    </div>
                    <div class="remont_container">    
                        <div class="remont">
                            <h2>Ремонт двигателя</h2>
                        </div>
                        <p>Замена масла в двигателе - 1000₽</p>
                        <p>Замена ремня ГРМ - 3500₽</p>
                        <p>Эндоскопия цилиндров и поршней - от 2600₽</p>
                    </div>
                </div>
                <div class="right_info">
                    <div class="to_container">
                        <div class="to">
                                <h2>Техническое обслуживание</h2>
                        </div>
                        <p>Плановое ТО - 1500₽</p>
                        <p>Сезонное ТО - 3500₽</p>
                    </div>
                    <div class="kkp_container">
                        <div class="remont_kkp">
                            <h2>Ремонт ККП</h2>
                        </div>
                        <p>Замена масла в МКПП - 1200₽</p>
                        <p>Замена масла в АКПП (Без снятия поддона) - 1500₽</p>
                        <p>Замена масла в АКПП (Со снятием поддона) - 2500₽</p>
                        <p>Замена воздушного фильтра - 300₽</p>
                    </div>
                </div>
            </div>
    </div>
    <!-- Pricing Plan End -->


    <!-- Team Start -->
    <section id="team">
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Члены команды</h6>
                <h1 class="display-5 text-uppercase mb-0">Квалифицированные специалисты</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Даниил</h5>
                        <p class="m-0">Механик</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Анзор</h5>
                        <p class="m-0">Механик</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Александр</h5>
                        <p class="m-0">Механик</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/team-4.jpg" alt="">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Валерий</h5>
                        <p class="m-0">Механик</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Team End -->
    
    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Связаться</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Балашихинское ш., 10А, Балашиха</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>daniilfedoseev2999@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+79017091185</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Быстрый переход</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Домой</a>
                        <a class="text-body mb-2" href="#about"><i class="bi bi-arrow-right text-primary me-2"></i>О нас</a>
                        <a class="text-body mb-2" href="#service"><i class="bi bi-arrow-right text-primary me-2"></i>Наши сервисы</a>
                        <a class="text-body mb-2" href="#team"><i class="bi bi-arrow-right text-primary me-2"></i>Наша команда</a>
                        <a class="text-body" href="contact.php"><i class="bi bi-arrow-right text-primary me-2"></i>Связаться с нами</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>