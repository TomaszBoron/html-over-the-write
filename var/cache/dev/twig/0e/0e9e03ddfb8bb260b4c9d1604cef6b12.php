<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* home/index.html.twig */
class __TwigTemplate_11445038161acb156ac4126fb4b2011a extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Hello HomeController!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"example-wrapper\">
    <!-- Hero -->
    <section class=\"bg-sky-800 text-white py-20\">
        <div class=\"container mx-auto px-6 text-center max-w-3xl\">
            <h1 class=\"text-4xl md:text-5xl font-extrabold mb-4\">Znajdź idealny produkt dla siebie</h1>
            <p class=\"mb-8 text-lg md:text-xl\">W naszym sklepie znajdziesz szeroki wybór produktów najwyższej jakości.</p>
            <a href=\"#products\"
               class=\"bg-white text-indigo-600 font-semibold py-3 px-6 rounded-lg hover:bg-gray-100 transition\">
                Zobacz produkty
            </a>
        </div>
    </section>

    <!-- Sekcja produktów -->
    <section id=\"products\" class=\"py-16 bg-gray-100\">
        <div class=\"container mx-auto px-6 max-w-6xl\">
            <h2 class=\"text-3xl font-bold mb-10 text-center text-gray-900\">Nasze produkty</h2>
            <div class=\"grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8\">

                <!-- Produkt 1 -->
                <div class=\"bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition\">
                    <img src=\"https://via.placeholder.com/300x200\" alt=\"Produkt 1\" class=\"w-full h-48 object-cover\" />
                    <div class=\"p-4\">
                        <h3 class=\"text-lg font-semibold mb-2\">Produkt 1</h3>
                        <p class=\"text-indigo-600 font-bold text-xl mb-4\">99,99 zł</p>
                        <button class=\"w-full bg-sky-800 text-white py-2 rounded hover:bg-indigo-700 transition\">
                            Dodaj do koszyka
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Stopka -->
    <footer class=\"bg-white shadow-inner py-8 mt-16\">
        <div class=\"container mx-auto px-6 text-center text-gray-600\">
            &copy; 2025 MójSklep. Wszelkie prawa zastrzeżone.
        </div>
    </footer>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello HomeController!{% endblock %}

{% block body %}
<div class=\"example-wrapper\">
    <!-- Hero -->
    <section class=\"bg-sky-800 text-white py-20\">
        <div class=\"container mx-auto px-6 text-center max-w-3xl\">
            <h1 class=\"text-4xl md:text-5xl font-extrabold mb-4\">Znajdź idealny produkt dla siebie</h1>
            <p class=\"mb-8 text-lg md:text-xl\">W naszym sklepie znajdziesz szeroki wybór produktów najwyższej jakości.</p>
            <a href=\"#products\"
               class=\"bg-white text-indigo-600 font-semibold py-3 px-6 rounded-lg hover:bg-gray-100 transition\">
                Zobacz produkty
            </a>
        </div>
    </section>

    <!-- Sekcja produktów -->
    <section id=\"products\" class=\"py-16 bg-gray-100\">
        <div class=\"container mx-auto px-6 max-w-6xl\">
            <h2 class=\"text-3xl font-bold mb-10 text-center text-gray-900\">Nasze produkty</h2>
            <div class=\"grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8\">

                <!-- Produkt 1 -->
                <div class=\"bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition\">
                    <img src=\"https://via.placeholder.com/300x200\" alt=\"Produkt 1\" class=\"w-full h-48 object-cover\" />
                    <div class=\"p-4\">
                        <h3 class=\"text-lg font-semibold mb-2\">Produkt 1</h3>
                        <p class=\"text-indigo-600 font-bold text-xl mb-4\">99,99 zł</p>
                        <button class=\"w-full bg-sky-800 text-white py-2 rounded hover:bg-indigo-700 transition\">
                            Dodaj do koszyka
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Stopka -->
    <footer class=\"bg-white shadow-inner py-8 mt-16\">
        <div class=\"container mx-auto px-6 text-center text-gray-600\">
            &copy; 2025 MójSklep. Wszelkie prawa zastrzeżone.
        </div>
    </footer>
</div>
{% endblock %}
", "home/index.html.twig", "/var/www/html/templates/home/index.html.twig");
    }
}
