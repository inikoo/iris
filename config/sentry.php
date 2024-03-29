<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 28 Oct 2022 17:32:15 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

return [

    'dsn'         => env('SENTRY_LARAVEL_DSN', env('SENTRY_DSN')),

    // The release version of your application
    // Example with dynamic git hash: trim(exec('git --git-dir ' . base_path('.git') . ' log --pretty="%h" -n1 HEAD'))
    'release'     => trim(
        exec(
            'git '.(
                (env('APP_ENV') == 'production' or env('APP_ENV') == 'staging')
                ?
                '--git-dir '.env('REPO_DIR')
                :
                ''
            ).' log --pretty="%h" -n1 HEAD'
        )
    ),

    // When left empty or `null` the Laravel environment will be used
    'environment' => env('SENTRY_ENVIRONMENT'),

    'breadcrumbs' => [
        // Capture Laravel logs in breadcrumbs
        'logs'         => true,

        // Capture SQL queries in breadcrumbs
        'sql_queries'  => true,

        // Capture bindings on SQL queries logged in breadcrumbs
        'sql_bindings' => true,

        // Capture queue job information in breadcrumbs
        'queue_info'   => true,

        // Capture command information in breadcrumbs
        'command_info' => true,
    ],

    'tracing'          => [
        // Trace queue jobs as their own transactions
        'queue_job_transactions' => env('SENTRY_TRACE_QUEUE_ENABLED', false),

        // Capture queue jobs as spans when executed on the sync driver
        'queue_jobs'             => true,

        // Capture SQL queries as spans
        'sql_queries'            => true,

        // Try to find out where the SQL query originated from and add it to the query spans
        'sql_origin'             => true,

        // Capture views as spans
        'views'                  => true,

        // Indicates if the tracing integrations supplied by Sentry should be loaded
        'default_integrations'   => true,

        // Indicates that requests without a matching route should be traced
        'missing_routes'         => false,
    ],

    // @see: https://docs.sentry.io/platforms/php/configuration/options/#send-default-pii
    'send_default_pii' => env('SENTRY_SEND_DEFAULT_PII', false),

    'traces_sample_rate' => (float)(env('SENTRY_TRACES_SAMPLE_RATE', 0.0)),

];
