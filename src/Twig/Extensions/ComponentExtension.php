<?php

namespace App\Twig\Extensions;

use Override;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use ReflectionClass;
use Slim\App;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ComponentExtension extends AbstractExtension
{
    public const string BASE = '_components';

    /** @var array<class-string, object> $components */
    protected array $components = [];


    public function __construct(protected App $app, protected Environment $twig)
    {
        $this->autoRegister();
        $this->registerRoutes();
    }

    public function autoRegister(): void
    {

        foreach (get_declared_classes() as $className) {
            $reflectionClass = new ReflectionClass($className);
            $attributes = $reflectionClass->getAttributes(AsComponent::class);

            if (count($attributes) > 0) {
                $this->registerComponent($reflectionClass);
            }
        }
    }

    /**
     * @param object $component
     * @return void
     */
    public function registerComponent(object $component): void
    {
        $className = $component instanceof ReflectionClass ? $component->getName() : get_class($component);
        $baseName = strtolower(substr($className, strrpos($className, '\\') + 1));
        $this->components[$baseName] = $component;
    }

    public function registerRoutes()
    {
        $ex = $this;
        $this->app->post('/_component/{component}', function (Request $request, Response $response, array $args) use ($ex) {
            $componentName = $args['component'];
            $data = json_decode($request->getBody()->getContents(), associative: true);
            $response->getBody()->write($ex->render($componentName, $data));
            return $response;
        });
    }

    public function render(string $componentName, array $args): string
    {
        $component = $this->components[$componentName];
        $className = $component->getName();
        $baseName = strtolower(substr($className, strrpos($className, '\\') + 1));
        $path = '_components/' . $baseName . '.html.twig';

        return $this->twig->render($path, $args);
    }

    /**
     * @param object[] $components
     * @return void
     */
    public function registerComponents(array $components): void
    {
        foreach ($components as $component) {
            $this->components[get_class($component)] = $component;
        }
    }

    #[Override] public function getFunctions()
    {
        $functions = [];

        foreach ($this->components as $className => $component) {
            // $className = basename($className);
            // $functionName = 'component' . substr($className, strrpos($className, '\\') + 1);

            $functions[] = new TwigFunction('component', [$this, 'render'], ['is_safe' => ['html']]);
        }

        return $functions;
    }
}