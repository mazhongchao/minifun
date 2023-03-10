## `minifun = Mini Functions`

## 介绍
`minifun`并**不是**一个大而全的Web开发框架，而是一个开发工具集，预期为`PHP`编程提供的一套朴素易用的开发工具。可以用`minifun`快速构建一些简单的、轻量的PHP程序，包括简易实用的`PHP`脚本程序、API，甚至是Web产品原型或演示系统，当然也可以在一些大的开发框架基础上或实际项目中引入`minifun`，以使用其提供的工具类和函数。

`minifun`并没有使用`psr4`的方式实现类的自动加载，而是使用`classmap`的方式。这意味着你不需要在`PHP`程序的开头书写大量的带有名字空间的冗长的类名，只需通过一句简单的`require "../vendor/autoload.php"`即可使用`minifun`提供的工具类和函数。

*`minifun`仍在开发当中，没有任何版本释放。*

## License
MIT license。