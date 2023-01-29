<p align="center">
<img src="info/logo.jpg">
</p>
 
## Tarifiner
Кароч изи пакет 
   

## Установка из composer

```  
composer require slavawins/tarifiner
```

 Опубликовать js файлы, вью и миграции необходимые для работы пакета.
Вызывать команду:
```
php artisan vendor:publish --provider="Tarifiner\Providers\TarifinerServiceProvider"
``` 

 В роутере routes/web.php удалить:
 добавить
 ```
    \Tarifiner\Library\TarifinerRoute::routes();
 ```

Выполнить миграцию
 ```
    php artisan migrate 
 ``` 
