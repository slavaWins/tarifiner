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

 В роутере routes/web.php 
 добавить
 ```
      Route::get('/plans', [App\Http\Controllers\Tarifiner\TarifinerController::class, 'Index'])->name('tarifiner');
    Route::get('/plans/move/{ind}', [App\Http\Controllers\Tarifiner\TarifinerController::class, 'MoveTo'])->name('tarifiner.move');

 ```

Выполнить миграцию
 ```
    php artisan migrate 
 ``` 
