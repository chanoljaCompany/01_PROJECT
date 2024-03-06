<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* table/search/selection_form.twig */
class __TwigTemplate_acbd28072248ea76d520a2c0b301bb3fe95a5c64ce857f75a1e8d1bd56dab523 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if ((($context["search_type"] ?? null) == "zoom")) {
            // line 2
            echo "    ";
            $this->loadTemplate("table/search/form_tag.twig", "table/search/selection_form.twig", 2)->display(twig_to_array(["script_name" => "tbl_zoom_select.php", "form_id" => "zoom_search_form", "db" =>             // line 5
($context["db"] ?? null), "table" =>             // line 6
($context["table"] ?? null), "goto" =>             // line 7
($context["goto"] ?? null)]));
            // line 9
            echo "    <fieldset id=\"fieldset_zoom_search\">
        <fieldset id=\"inputSection\">
            <legend>
                ";
            // line 12
            echo _gettext("Do a \"query by example\" (wildcard: \"%\") for two different columns");
            // line 13
            echo "            </legend>
            ";
            // line 14
            $this->loadTemplate("table/search/fields_table.twig", "table/search/selection_form.twig", 14)->display(twig_to_array(["self" =>             // line 15
($context["self"] ?? null), "search_type" =>             // line 16
($context["search_type"] ?? null), "geom_column_flag" =>             // line 17
($context["geom_column_flag"] ?? null), "column_names" =>             // line 18
($context["column_names"] ?? null), "column_types" =>             // line 19
($context["column_types"] ?? null), "column_collations" =>             // line 20
($context["column_collations"] ?? null), "criteria_column_names" =>             // line 21
($context["criteria_column_names"] ?? null), "criteria_column_types" =>             // line 22
($context["criteria_column_types"] ?? null)]));
            // line 24
            echo "            ";
            $this->loadTemplate("table/search/options_zoom.twig", "table/search/selection_form.twig", 24)->display(twig_to_array(["data_label" =>             // line 25
($context["data_label"] ?? null), "column_names" =>             // line 26
($context["column_names"] ?? null), "max_plot_limit" =>             // line 27
($context["max_plot_limit"] ?? null)]));
            // line 29
            echo "        </fieldset>
    </fieldset>
";
        } elseif ((        // line 31
($context["search_type"] ?? null) == "normal")) {
            // line 32
            echo "    ";
            $this->loadTemplate("table/search/form_tag.twig", "table/search/selection_form.twig", 32)->display(twig_to_array(["script_name" => "tbl_select.php", "form_id" => "tbl_search_form", "db" =>             // line 35
($context["db"] ?? null), "table" =>             // line 36
($context["table"] ?? null), "goto" =>             // line 37
($context["goto"] ?? null)]));
            // line 39
            echo "    <fieldset id=\"fieldset_table_search\">
        <fieldset id=\"fieldset_table_qbe\">
            <legend>
                ";
            // line 42
            echo _gettext("Do a \"query by example\" (wildcard: \"%\")");
            // line 43
            echo "            </legend>
            <div class=\"responsivetable jsresponsive\">
                ";
            // line 45
            $this->loadTemplate("table/search/fields_table.twig", "table/search/selection_form.twig", 45)->display(twig_to_array(["self" =>             // line 46
($context["self"] ?? null), "search_type" =>             // line 47
($context["search_type"] ?? null), "geo