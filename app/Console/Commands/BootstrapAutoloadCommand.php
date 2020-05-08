<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BootstrapAutoloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bootstrap:autoload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load OverrideHelper';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $autoloadPath = base_path('vendor/autoload.php');
        $helperPath = app_path('Helpers/OverrideHelper.php');

        // オートローダーのファイル内容を読み込む
        $before = file_get_contents($autoloadPath);

        // 先に自作ヘルパファイルを一番最初に読み込むようにする
        $after = str_replace('<?php' . PHP_EOL, "<?php require_once '$helperPath';" . PHP_EOL, $before);

        // オートローダーを上書きする
        file_put_contents($autoloadPath, $after);

        return 0;
    }
}
