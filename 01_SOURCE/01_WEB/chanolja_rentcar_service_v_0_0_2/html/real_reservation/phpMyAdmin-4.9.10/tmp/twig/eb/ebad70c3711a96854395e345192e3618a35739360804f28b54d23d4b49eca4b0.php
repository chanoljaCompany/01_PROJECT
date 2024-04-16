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

/* database/structure/structure_table_row.twig */
class __TwigTemplate_2eaec956bf63ceb1da413c2f5986d2015818c3882f58ec7882ec18c08a53a296 extends \Twig\Template
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
        echo "<tr id=\"row_tbl_";
        echo twig_escape_filter($this->env, ($context["curr"] ?? null), "html", null, true);
        echo "\"";
        echo ((($context["table_is_view"] ?? null)) ? (" class=\"is_view\"") : (""));
        echo " data-filter-row=\"";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute(($context["current_table"] ?? null), "TABLE_NAME", [], "array")), "html", null, true);
        echo "\">
    <td class=\"center print_ignore\">
        <input type=\"checkbox\"
            name=\"selected_tbl[]\"
            class=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["input_class"] ?? null), "html", null, true);
        echo "\"
            value=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["current_table"] ?? null), "TABLE_NAME", [], "array"), "html", null, true);
        echo "\"
            id=\"checkbox_tbl_";
        // line 7
        echo twig_escape_filter($this->env, ($context["curr"] ?? null), "html", null, true);
        echo "\" />
    </td>
    <th>
        ";
        // line 10
        echo ($context["browse_table_label"] ?? null);
        echo "
        ";
        // line 11
        echo ($context["tracking_icon"] ?? null);
        echo "
    </th>
    ";
        // line 13
        if (($context["server_slave_status"] ?? null)) {
            // line 14
            echo "        <td class=\"center\">
            ";
            // line 15
            echo ((($context["ignored"] ?? null)) ? (PhpMyAdmin\Util::getImage("s_cancel", _gettext("Not replicated"))) : (""));
            echo "
            ";
            // line 16
            echo ((($context["do"] ?? null)) ? (PhpMyAdmin\Util::getImage("s_success", _gettext("Replicated"))) : (""));
            echo "
        </td>
    ";
        }
        // line 19
        echo "
    ";
        // line 21
        echo "    ";
        if ((($context["num_favorite_tables"] ?? null) > 0)) {
            // line 22
            echo "        <td class=\"center print_ignore\">
            ";
            // line 24
            echo "            ";
            $context["fav_params"] = ["db" =>             // line 25
($context["db"] ?? null), "ajax_request" => true, "favorite_table" => $this->getAttribute(            // line 27
($context["current_table"] ?? null), "TABLE_NAME", [], "array"), (((            // line 28
($context["already_favorite"] ?? null)) ? ("remove") : ("add")) . "_favorite") => true];
            // line 30
            echo "            ";
            $this->loadTemplate("database/structure/favorite_anchor.twig", "database/structure/structure_table_row.twig", 30)->display(twig_to_array(["table_name_hash" => md5($this->getAttribute(            // line 31
($context["current_table"] ?? null), "TABLE_NAME", [], "array")), "db_table_name_hash" => md5(((            // line 32
($context["db"] ?? null) . ".") . $this->getAttribute(($context["current_table"] ?? null), "TABLE_NAME", [], "array"))), "fav_params" =>             // line 33
($context["fav_params"] ?? null), "already_favorite" =>             // line 34
($context["already_favorite"] ?? null), "titles" =>             // line 35
($context["titles"] ?? null)]));
            // line 37
            echo "        </td>
    ";
        }
        // line 39
        echo "
    <td class=\"center print_ignore\">
        ";
        // line 41
        echo ($context["browse_table"] ?? null);
        echo "
    </td>
    <td class=\"center print_ignore\">
        <a href=\"tbl_structure.php";
        // line 44
        echo ($context["tbl_url_query"] ?? null);
        echo "\">
            ";
        // line 45
        echo $this->getAttribute(($context["titles"] ?? null), "Structure", [], "array");
        echo "
        </a>
    </td>
    <td class=\"center print_ignore\">
        ";
        // line 49
        echo ($context["search_table"] ?? null);
        echo "
    </td>

    ";
        // line 52
        if ( !($context["db_is_system_schema"] ?? null)) {
            // line 53
            echo "        <td class=\"insert_table center print_ignore\">
            <a href=\"tbl_change.php";
            // line 54
            echo ($context["tbl_url_query"] ?? null);
            echo "\">";
            echo $this->getAttribute(($context["titles"] ?? null), "Insert", [], "array");
            echo "</a>
        </td>
        <td class=\"center print_ignore\">";
            // line 56
            echo ($context["empty_table"] ?? null);
            echo "</td>
        <td class=\"center print_ignore\">
            <a class=\"ajax drop_table_anchor";
            // line 59
            echo (((($context["table_is_view"] ?? null) || ($this->getAttribute(($context["current_table"] ?? null), "ENGINE", [], "array") == null))) ? (" view") : (""));
            echo "\"
                href=\"sql.php\" data-post=\"";
            // line 60
            echo ($context["tbl_url_query"] ?? null);
            echo "&amp;reload=1&amp;purge=1&amp;sql_query=";
            // line 61
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["drop_query"] ?? null)), "html", null, true);
            echo "&amp;message_to_show=";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["drop_message"] ?? null)), "html", null, true);
            echo "\">
                ";
            // line 62
            echo $this->getAttribute(($context["titles"] ?? null), "Drop", [], "array");
            echo "
            </a>
        </td>
    ";
        }
        // line 66
        echo "
    ";
        // line 67
        if (($this->getAttribute(($context["current_table"] ?? null), "TABLE_ROWS", [], "array", true, true) && (($this->getAttribute(        // line 68
($context["current_table"] ?? null), "ENGINE", [], "array") != null) || ($context["table_is_view"] ?? null)))) {
            // line 69
            echo "        ";
            // line 70
            echo "        ";
            $context["row_count"] = PhpMyAdmin\Util::formatNumber($this->getAttribute(($context["current_table"] ?? null), "TABLE_ROWS", [], "array"), 0);
            // line 71
            echo "
        ";
            // line 74
            echo "        <td class=\"value tbl_rows\"
            data-table=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute(($context["current_table"] ?? null), "TABLE_NAME", [], "array"), "html", null, true);
            echo "\">
            ";
            // line 76
            if (($context["approx_rows"] ?? null)) {
                // line 77
                echo "                <a href=\"db_structure.php";
                echo PhpMyAdmin\Url::getCommon(["ajax_request" => true, "db" =>                 // line 79
($context["db"] ?? null), "table" => $this->getAttribute(                // line 80
($context["current_table"] ?? null), "TABLE_NAME", [], "array"), "real_row_count" => "true"]);
                // line 82
                echo "\" class=\"ajax real_row_count\">
                    <bdi>
                        ~";
                // line 84
                echo twig_escape_filter($this->env, ($context["row_count"] ?? null), "html", null, true);
                echo "
                    </bdi>
                </a>
            ";
            } else {
                // line 88
                echo "                ";
                echo twig_escape_filter($this->env, ($context["row_count"] ?? null), "html", null, true);
                echo "
            ";
            }
            // line 90
            echo "            ";
            echo ($context["show_superscript"] ?? null);
            echo "
        </td>

        ";
            // line 93
            if ( !(($context["properties_num_columns"] ?? null) > 1)) {
                // line 94
                echo "            <td class=\"nowrap\">
                ";
                // line 95
                if ( !twig_test_empty($this->getAttribute(($context["current_table"] ?? null), "ENGINE", [], "array"))) {
                    // line 96
                    echo "                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["current_table"] ?? null), "ENGINE", [], "array"), "html", null, true);
                    echo "
                ";
                } elseif (                // line 97
($context["table_is_view"] ?? null)) {
                    // line 98
                    echo "                    ";
                    echo _gettext("View");
                    // line 99
                    echo "                ";
                }
                // line 100
                echo "            </td>
            ";
                // line 101
                if ((twig_length_filter($this->env, ($context["collation"] ?? null)) > 0)) {
                    // line 102
                    echo "                <td class=\"nowrap\">
                    ";
                    // line 103
                    echo ($context["collation"] ?? null);
                    echo "
                </td>
            ";
                }
                // line 106
                echo "        ";
            }
            // line 107
            echo "
        ";
            // line 108
            if (($context["is_show_stats"] ?? null)) {
                // line 109
                echo "            <td class=\"value tbl_size\">
                <a href=\"tbl_structure.php";
                // line 110
                echo ($context["tbl_url_query"] ?? null);
                echo "#showusage\">
                    <span>";
                // line 111
                echo twig_escape_filter($this->env, ($context["formatted_size"] ?? null), "html", null, true);
                echo "</span>
                    <span class=\"unit\">";
                // line 112
                echo twig_escape_filter($this->env, ($context["unit"] ?? null), "html", null, true);
                echo "</span>
                </a>
            </td>
            <td class=\"value tbl_overhead\">
                ";
                // line 116
                echo ($context["overhead"] ?? null);
                echo "
            </td>
        ";
            }
            // line 119
            echo "
        ";
            // line 120
            if ( !(($context["show_charset"] ?? null) > 1)) {
                // line 121
                echo "            ";
                if ((twig_length_filter($this->env, ($context["charset"] ?? null)) > 0)) {
                    // line 122
                    echo "                <td class=\"nowrap\">
                    ";
                    // line 123
                    echo ($context["charset"] ?? null);
                    echo "
                </td>
            ";
                }
                // line 126
                echo "        ";
            }
            // line 127
            echo "
        ";
            // line 128
            if (($context["show_comment"] ?? null)) {
                // line 129
                echo "            ";
                $context["comment"] = $this->getAttribute(($context["current_table"] ?? null), "Comment", [], "array");
                // line 130
                echo "            <td>
                ";
                // line 131
                if ((twig_length_filter($this->env, ($context["comment"] ?? null)) > ($context["limit_chars"] ?? null))) {
                    // line 132
                    echo "                    <abbr title=\"";
                    echo twig_escape_filter($this->env, ($context["comment"] ?? null), "html", null, true);
                    echo "\">
                        ";
                    // line 133
                    echo twig_escape_filter($this->env, twig_slice($this->env, ($context["comment"] ?? null), 0, ($context["limit_chars"] ?? null)), "html", null, true);
                    echo "
                        ...
                    </abbr>
                ";
                } else {
                    // line 137
                    echo "                    ";
                    echo twig_escape_filter($this->env, ($context["comment"] ?? null), "html", null, true);
                    echo "
                ";
                }
                // line 139
                echo "            </td>
        ";
            }
            // line 141
            echo "
        ";
            // line 142
            if (($context["show_creation"] ?? null)) {
                // line 143
                echo "            <td class=\"value tbl_creation\">
                ";
                // line 144
                ((($context["create_time"] ?? null)) ? (print (twig_escape_filter($this->env, PhpMyAdmin\Util::localisedDate(strtotime(($context["create_time"] ?? null))), "html", null, true))) : (print ("-")));
                echo "
            </td>
        ";
            }
            // line 147
            echo "
        ";
            // line 148
            if (($context["show_last_update"] ?? null)) {
                // line 149
                echo "            <td class=\"value tbl_last_update\">
                ";
                // line 150
                ((($context["update_time"] ?? null)) ? (print (twig_escape_filter($this->env, PhpMyAdmin\Util::localisedDate(strtotime(($context["update_time"] ?? null))), "html", null, true))) : (print ("-")));
                echo "
            </td>
        ";
            }
            // line 153
            echo "
        ";
            // line 154
            if (($context["show_last_check"] ?? null)) {
                // line 155
                echo "            <td class=\"value tbl_last_check\">
                ";
                // line 156
                ((($context["check_time"] ?? null)) ? (print (twig_escape_filter($this->env, PhpMyAdmin\Util::localisedDate(strtotime(($context["check_time"] ?? null))), "html", null, true))) : (print ("-")));
                echo "
            </td>
        ";
            }
            // line 159
            echo "
    ";
        } elseif (        // line 160
($context["table_is_view"] ?? null)) {
            // line 161
            echo "        <td class=\"value tbl_rows\">-</td>
        <td class=\"nowrap\">
            ";
            // line 163
            echo _gettext("View");
            // line 164
            echo "        </td>
        <td class=\"nowrap\">---</td>
        ";
            // line 166
            if (($context["is_show_stats"] ?? null)) {
                // line 167
                echo "            <td class=\"value tbl_size\">-</td>
            <td class=\"value tbl_overhead\">-</td>
        ";
            }
            // line 170
            echo "        ";
            if (($context["show_charset"] ?? null)) {
                // line 171
                echo "            <td></td>
        ";
            }
            // line 173
            echo "        ";
            if (($context["show_comment"] ?? null)) {
                // line 174
                echo "            <td></td>
        ";
            }
            // line 176
            echo "        ";
            if (($context["show_creation"] ?? null)) {
                // line 177
                echo "            <td class=\"value tbl_creation\">-</td>
        ";
            }
            // line 179
            echo "        ";
            if (($context["show_last_update"] ?? null)) {
                // line 180
                e