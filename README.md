# Deployer Check Recipe

Simple Deployer recipe that checks for uncommited and unpushed changes in current release folder.

Task will throw `RuntimeException` if finds any uncommited/unpushed data.

## Usage

Just run `check` task before new release creation

```php
before('deploy:release', 'check');
```

or

```php
before('deploy:release', 'check:uncommited');
before('deploy:release', 'check:unpushed');
```
