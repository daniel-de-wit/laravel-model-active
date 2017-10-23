# laravel-model-active
A trait for Laravel to only pull models marked as "active". When the trait is applied to
a model, the queries will, by default, only find rows for that model where
the active column has a value of 1.

# Requirements

- Laravel ^5.2

# Installation

Add package to composer.json

`composer require daniel-de-wit/laravel-model-active`

# Usage

Add `active` boolean to Eloquent Model:

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveModelSupportToArticleTable extends Migration
{
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->boolean('active')->default(true)->index();
        });
    }
    
    public function down()
    {
        Schema::table('article', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
}
```


Add the `Active` trait to the model:

```php
<?php

class MyModel extends Eloquent
{
    use Active;

    ...

}
```

Removing Active Scope

If you would like to remove the active scope for a given query, you may use the withoutGlobalScope method:

```php
<?php

    MyModel::withoutGlobalScope(ActiveScope::class)->get();
```