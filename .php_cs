<?php

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'no_php4_constructor' => true,
        'array_syntax' => ['syntax' => 'short'],
        'align_multiline_comment' => ['comment_type' => 'phpdocs_only'],
        'phpdoc_add_missing_param_annotation' => true,
        'yoda_style' => false,
        'is_null' => true,
        'dir_constant' => true,
        'linebreak_after_opening_tag' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ereg_to_preg' => true,
        'not_operator_with_space' => true,
        'modernize_types_casting' => true,
        'single_line_comment_style' => [
            'comment_types' => ['hash', 'asterisk']
        ],
        'no_homoglyph_names' => true,
        'non_printable_character' => true,
        'no_alias_functions' => true,
        'ternary_to_null_coalescing' => true,
        'declare_strict_types' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in([
                __DIR__.'/app',
                __DIR__.'/tests',
            ])
    )
    ->setRiskyAllowed(true);
