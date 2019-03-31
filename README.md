# codeigniter-queue-job
CodeIgniter Quick and Convenient Queue Installation Package

本包最终目的是能像Laravel那样的方式快速实现CodeIgniter的队列（目前主要基于redis驱动，后续或继续加入数据库等其他驱动方式）
整合 [yidas/codeigniter-queue-worker](https://github.com/yidas/codeigniter-queue-worker)和[marsanla/Codeigniter-jobQueue](https://github.com/marsanla/Codeigniter-jobQueue)

## 安装/配置

  1.安装composer包
   
    composer require pidongqq/codeigniter-queue-job

  2.复制本包libraries目录下mcurl.php文件和Redis.php文件到项目框架application\libraries中
  
  3.复制本包config目录下配置文件queue.php到项目框架application\config中
  
## 使用
  
  创建任务所在的控制器需继承`Pidong\Queue\QueueController`,例如：
 
```php
class Task extends Pidong\Queue\QueueController
{
  \\your business code
}
```  
  
  创建任务
  
```php
$this->dispatch($queueName, $controller, $method, $params);
//$queueName (string): 是队列名称（你可能需要不同的队列）
//$controller/$method(string): 队列最终执行会在你指定的$controller/$method中处理
//$params (array): 是你希望在队列中存的信息或参数
//在$controller/$method获取参数使用$_POST
``` 

  使用指定连接 
```php
$this->onConnection($connectName)->dispatch($queueName, $controller, $method, $params);
//使用指定连接时，你需要现在config/queue.php添加该连接（该配置文件来自 安装 第3步）
//！！！注意：要先使用onConnection再dispatch
``` 
  queue.php连接配置
```php
  $config['queue_connections'] = [
      'default' => [
          'host'     => 'localhost',
          'port'     => '6379',
          'password' => ''
      ]
  ];
  //可以按照此格式，添加更多连接
```

  
  ### 启动队列程序
  
  在项目根目录执行
  
  ```
    $ php public/index.php Pidong/Queue/Controller/launch //开启后台程序，监听任务并执行worker
    
    //只启动监听程序
    $ php public/index.php Pidong/Queue/Controller/listen
    //只启动worker
    $ php public/index.php Pidong/Queue/Controller/worker
  ```
  需要配置队列程序其他参数，比如worker子进程的数量，队列监听器没有任务时多久触发下次读取任务
  或者需要复写队列程序的一些功能，请先参考[yidas/codeigniter-queue-worker](https://github.com/yidas/codeigniter-queue-worker)
  
  关于[marsanla/Codeigniter-jobQueue](https://github.com/marsanla/Codeigniter-jobQueue)，因修改了逻辑和修复了一些bug，请勿直接使用该库文，应使用本包中修改过的。具体指令，如查询当前队列名，或者当前队列中任务状态等，可进入[marsanla/Codeigniter-jobQueue](https://github.com/marsanla/Codeigniter-jobQueue)查看
  
  
  ## 鸣谢
  [yidas/codeigniter-queue-worker](https://github.com/yidas/codeigniter-queue-worker)
  [marsanla/Codeigniter-jobQueue](https://github.com/marsanla/Codeigniter-jobQueue)
  
