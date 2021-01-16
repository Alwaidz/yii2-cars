# yii2-cars
Module for vehicle listing

# MODÜL AÇIKLAMASI

Bu modülde kullanıcılar, içinde araba markalarının olduğu tablodan (cars) veri çekerek kendi araba ilanlarını bir tabloya (posts) ekleyebilirler.

# KURULUM

Modülün kurulumu için aşağıdaki adımlar izlenir.

- Öncelikle, command-line'dan Vagrant'ın olduğu klasöre girilir. Ardından Vagrant çalıştırılır.

```sh
vagrant up
```

- Proje dizininde ssh ile Vagrant makinesine bağlanılır. Örnek:

```sh
ssh -i .vagrant/machines/proje/virtualbox/private_key vagrant@proje
```

- Packagist yardımıyla projeye modül çekilir.

```sh
composer require alwaidz/yii2-cars
```

- Modül, projeye eklendikten sonra migrate işlemi yapılarak veritabanına tablolar ve gerekli veriler eklenir.

```sh
php yii migrate/up --migrationPath=@vendor/alwaidz/yii2-cars/migrations
```

- Projenin Backend ve Frontend kısımlarındaki proje/backend/config/main.php ve proje/backend/config/main.php dosyalarına aşağıdaki kodlar eklenir.

```sh
'modules' => [
        'cars' => [
            'class' => 'alwaidz\cars\Module'
        ]
    ],
```

Kurulum işlemi tamamlanmıştır.

# KULLANIM

Proje kurulduktan sonra projeyi kullanmak için aşağıdaki sayfaya erişilir.

```sh
http://advanced/backend/web/index.php?r=cars/posts/index
```
Bu sayfada, verilmiş ilanlar görünmektedir. 

![İlanlar](https://i.imgur.com/w3Frm3n.png)

Create Post seçeneği ile yeni bir ilan oluşturulabilir. Burada, Dropdownlist ile "cars" tablosundan foreign key ile bağlı marka verisi vardır. Verilen ilana göre bunun seçimi yapılır.

![İlan oluşturma](https://i.imgur.com/VQOgVIi.png)

Cars tablosuna erişmek için ise

```sh
http://advanced/backend/web/index.php?r=cars/cars/index
```
linki kullanılır. Burada, ilanı oluşturulabilecek başka araba markaları oluşturulabilir ya da mevcut veritabanında bulunan markalar gözlemlenebilir.

![İlan oluşturma](https://i.imgur.com/WGbhslJ.png)


