<?php

namespace Deployer;

task('check:uncommited', function() {
    $result = run("cd {{deploy_path}} && if [ -d current ]; then cd current && {{bin/git}} status --porcelain; fi")->toString();
    if (strlen($result) > 0) {
        throw new \RuntimeException(
            "Working copy contains uncommited/unstaged changes"
        );
    }
});

task('check:unpushed', function() {
    $result = run("cd {{deploy_path}} && if [ -d current ]; then cd current && {{bin/git}} log --oneline origin/{{branch}}..{{branch}}; fi")->toString();
    if (strlen($result) > 0) {
        throw new \RuntimeException(
            "Working copy contains unpushed changes"
        );
    }
});

task(
    'check',
    [
        'check:uncommited',
        'check:unpushed'
    ]
);
