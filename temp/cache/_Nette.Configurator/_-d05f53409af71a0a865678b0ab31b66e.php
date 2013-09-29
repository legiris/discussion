<?php //netteCache[01]000388a:2:{s:4:"time";s:21:"0.33976200 1379456830";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"E:\xampp\htdocs\web\forum\sandbox\app\config\config.neon";i:2;i:1379446056;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:62:"E:\xampp\htdocs\web\forum\sandbox\app\config\config.local.neon";i:2;i:1362754058;}}}?><?php
// source: E:\xampp\htdocs\web\forum\sandbox\app/config/config.neon development
// source: E:\xampp\htdocs\web\forum\sandbox\app/config/config.local.neon 

/**
 * @property Nette\Application\Application $application
 * @property BaseManager $baseManager
 * @property Nette\Caching\Storages\FileStorage $cacheStorage
 * @property Comment $comment
 * @property Nette\DI\NestedAccessor $constants
 * @property Nette\DI\Container $container
 * @property SystemContainer_dibi $dibi
 * @property Nette\Http\Request $httpRequest
 * @property Nette\Http\Response $httpResponse
 * @property SystemContainer_nette $nette
 * @property Nette\DI\NestedAccessor $php
 * @property Nette\Application\IRouter $router
 * @property RouterFactory $routerFactory
 * @property Nette\Http\Session $session
 * @property Thread $thread
 * @property Nette\Security\User $user
 */
class SystemContainer extends Nette\DI\Container
{

	public $classes = array(
		'nette\\object' => FALSE, //: nette.cacheJournal, cacheStorage, nette.httpRequestFactory, httpRequest, httpResponse, nette.httpContext, session, nette.userStorage, user, application, nette.mailer, nette.database, comment, thread, baseManager, container,
		'nette\\caching\\storages\\ijournal' => 'nette.cacheJournal',
		'nette\\caching\\storages\\filejournal' => 'nette.cacheJournal',
		'nette\\caching\\istorage' => 'cacheStorage',
		'nette\\caching\\storages\\filestorage' => 'cacheStorage',
		'nette\\http\\requestfactory' => 'nette.httpRequestFactory',
		'nette\\http\\irequest' => 'httpRequest',
		'nette\\http\\request' => 'httpRequest',
		'nette\\http\\iresponse' => 'httpResponse',
		'nette\\http\\response' => 'httpResponse',
		'nette\\http\\context' => 'nette.httpContext',
		'nette\\http\\session' => 'session',
		'nette\\security\\iuserstorage' => 'nette.userStorage',
		'nette\\http\\userstorage' => 'nette.userStorage',
		'nette\\security\\user' => 'user',
		'nette\\application\\application' => 'application',
		'nette\\application\\ipresenterfactory' => 'nette.presenterFactory',
		'nette\\application\\presenterfactory' => 'nette.presenterFactory',
		'nette\\application\\irouter' => 'router',
		'nette\\mail\\imailer' => 'nette.mailer',
		'nette\\mail\\sendmailmailer' => 'nette.mailer',
		'nette\\di\\nestedaccessor' => 'nette.database',
		'dibiobject' => 'dibi.connection',
		'dibiconnection' => 'dibi.connection',
		'basemanager' => FALSE, //: comment, thread, baseManager,
		'comment' => 'comment',
		'thread' => 'thread',
		'routerfactory' => 'routerFactory',
		'nette\\freezableobject' => 'container',
		'nette\\ifreezable' => 'container',
		'nette\\di\\icontainer' => 'container',
		'nette\\di\\container' => 'container',
	);

	public $meta = array();


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => 'E:\\xampp\\htdocs\\web\\forum\\sandbox\\app',
			'wwwDir' => 'E:/xampp/htdocs/web/forum/sandbox/www',
			'debugMode' => FALSE,
			'productionMode' => TRUE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array(
				'class' => 'SystemContainer',
				'parent' => 'Nette\\DI\\Container',
			),
			'tempDir' => 'E:\\xampp\\htdocs\\web\\forum\\sandbox\\app/../temp',
		));
	}


	/**
	 * @return Nette\Application\Application
	 */
	protected function createServiceApplication()
	{
		$service = new Nette\Application\Application($this->getService('nette.presenterFactory'), $this->getService('router'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->catchExceptions = TRUE;
		$service->errorPresenter = 'Error';
		Nette\Application\Diagnostics\RoutingPanel::initializePanel($service);
		return $service;
	}


	/**
	 * @return BaseManager
	 */
	protected function createServiceBaseManager()
	{
		$service = new BaseManager($this->getService('dibi.connection'));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileStorage
	 */
	protected function createServiceCacheStorage()
	{
		$service = new Nette\Caching\Storages\FileStorage('E:\\xampp\\htdocs\\web\\forum\\sandbox\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Comment
	 */
	protected function createServiceComment()
	{
		$service = new Comment($this->getService('dibi.connection'));
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServiceConstants()
	{
		$service = new Nette\DI\NestedAccessor($this, 'constants');
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	protected function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServiceDibi()
	{
		$service = new Nette\DI\NestedAccessor($this, 'dibi');
		return $service;
	}


	/**
	 * @return DibiConnection
	 */
	protected function createServiceDibi__connection()
	{
		$service = new DibiConnection(array(
			'driver' => 'mysqli',
			'host' => 'wm36.wedos.net',
			'username' => 'w18105_xforum',
			'password' => 'mtabS9JX',
			'database' => 'd18105_xforum',
			'lazy' => TRUE,
			'charset' => 'utf8',
		));
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	protected function createServiceHttpRequest()
	{
		$service = $this->getService('nette.httpRequestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'httpRequest\', value returned by factory is not Nette\\Http\\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	protected function createServiceHttpResponse()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServiceNette()
	{
		$service = new Nette\DI\NestedAccessor($this, 'nette');
		return $service;
	}


	/**
	 * @return Nette\Forms\Form
	 */
	public function createNette__basicForm()
	{
		$service = new Nette\Forms\Form;
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__basicFormFactory()
	{
		$service = new Nette\Callback($this, 'createNette__basicForm');
		return $service;
	}


	/**
	 * @return Nette\Caching\Cache
	 */
	public function createNette__cache($namespace = NULL)
	{
		$service = new Nette\Caching\Cache($this->getService('cacheStorage'), $namespace);
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__cacheFactory()
	{
		$service = new Nette\Callback($this, 'createNette__cache');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileJournal
	 */
	protected function createServiceNette__cacheJournal()
	{
		$service = new Nette\Caching\Storages\FileJournal('E:\\xampp\\htdocs\\web\\forum\\sandbox\\app/../temp');
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServiceNette__database()
	{
		$service = new Nette\DI\NestedAccessor($this, 'nette.database');
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	protected function createServiceNette__httpContext()
	{
		$service = new Nette\Http\Context($this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	protected function createServiceNette__httpRequestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setEncoding('UTF-8');
		return $service;
	}


	/**
	 * @return Nette\Latte\Engine
	 */
	public function createNette__latte()
	{
		$service = new Nette\Latte\Engine;
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__latteFactory()
	{
		$service = new Nette\Callback($this, 'createNette__latte');
		return $service;
	}


	/**
	 * @return Nette\Mail\Message
	 */
	public function createNette__mail()
	{
		$service = new Nette\Mail\Message;
		$service->setMailer($this->getService('nette.mailer'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__mailFactory()
	{
		$service = new Nette\Callback($this, 'createNette__mail');
		return $service;
	}


	/**
	 * @return Nette\Mail\SendmailMailer
	 */
	protected function createServiceNette__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\PresenterFactory
	 */
	protected function createServiceNette__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory('E:\\xampp\\htdocs\\web\\forum\\sandbox\\app', $this);
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		$service->registerFilter($this->createNette__latte());
		$service->registerHelperLoader('Nette\\Templating\\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\PhpFileStorage
	 */
	protected function createServiceNette__templateCacheStorage()
	{
		$service = new Nette\Caching\Storages\PhpFileStorage('E:\\xampp\\htdocs\\web\\forum\\sandbox\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Nette\Callback
	 */
	protected function createServiceNette__templateFactory()
	{
		$service = new Nette\Callback($this, 'createNette__template');
		return $service;
	}


	/**
	 * @return Nette\Http\UserStorage
	 */
	protected function createServiceNette__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session'));
		return $service;
	}


	/**
	 * @return Nette\DI\NestedAccessor
	 */
	protected function createServicePhp()
	{
		$service = new Nette\DI\NestedAccessor($this, 'php');
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	protected function createServiceRouter()
	{
		$service = $this->getService('routerFactory')->createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'router\', value returned by factory is not Nette\\Application\\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return RouterFactory
	 */
	protected function createServiceRouterFactory()
	{
		$service = new RouterFactory;
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	protected function createServiceSession()
	{
		$service = new Nette\Http\Session($this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return Thread
	 */
	protected function createServiceThread()
	{
		$service = new Thread($this->getService('dibi.connection'));
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	protected function createServiceUser()
	{
		$service = new Nette\Security\User($this->getService('nette.userStorage'), $this);
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		Nette\Caching\Storages\FileStorage::$useDirectories = TRUE;

		$this->session->exists() && $this->session->start();
		header('X-Frame-Options: SAMEORIGIN');
	}

}



/**
 * @method Nette\Forms\Form createBasicForm()
 * @property Nette\Callback $basicFormFactory
 * @method Nette\Caching\Cache createCache()
 * @property Nette\Callback $cacheFactory
 * @property Nette\Caching\Storages\FileJournal $cacheJournal
 * @property Nette\DI\NestedAccessor $database
 * @property Nette\Http\Context $httpContext
 * @method Nette\Latte\Engine createLatte()
 * @property Nette\Callback $latteFactory
 * @method Nette\Mail\Message createMail()
 * @property Nette\Callback $mailFactory
 * @property Nette\Mail\SendmailMailer $mailer
 * @property Nette\Application\PresenterFactory $presenterFactory
 * @method Nette\Templating\FileTemplate createTemplate()
 * @property Nette\Caching\Storages\PhpFileStorage $templateCacheStorage
 * @property Nette\Callback $templateFactory
 * @property Nette\Http\UserStorage $userStorage
 */
class SystemContainer_nette
{



}



/**
 * @property DibiConnection $connection
 */
class SystemContainer_dibi
{



}
