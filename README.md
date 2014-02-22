# codeigniter-scaffold 

Simple scaffold generator for codeigniter 2.1 now using Twitter Bootstrap templates!

## Usage

    codeigniter-scaffold [options...]
      -h, --help show this help
      -i, --init unzip a codeigniter 2.1.2 installaion in the current dir
      -s, --scaffold <model-name> field1:string, field2:text field3:integer, and so on..


## Pre-setup

* After running 'codeigniter-scaffold --init':
  * Open 'application/config/config.php' and set-up the 'base_url' property;
  * Open 'application/config/database.php' and set-up your database settings;


 
* After running 'codeigniter-scaffold --scaffold [options...]'
  * Go to 'application/migrations' and run the generated script into your database;

  
* Have fun =)

## Video Tutorial

Check out the video that show how to use codeigniter-scaffold at [youtube.com](https://www.youtube.com/watch?v=2Djlz7nP1ks).

Você também pode ver o vídeo em Portugues - Brasil (updated version UI) [youtube.com with Twitter Bootstrap](http://www.youtube.com/watch?v=nofk3_W71Qg).


## Generated Resources

![ScreenShot](https://raw.github.com/zekitow/codeigniter-scaffold/master/ss/list.png)
![ScreenShot](https://raw.github.com/zekitow/codeigniter-scaffold/master/ss/create.png)


## Contributing to codeigniter-scaffold
 
* Check out the latest master to make sure the feature hasn't been implemented or the bug hasn't been fixed yet.
* Check out the issue tracker to make sure someone already hasn't requested it and/or contributed it.
* Fork the project.
* Start a feature/bugfix branch.
* Commit and push until you are happy with your contribution.
* Make sure to add tests for it. This is important so I don't break it in a future version unintentionally.
* Please try not to mess with the Rakefile, version, or history. If you want to have your own version, or is otherwise necessary, that is fine, but please isolate to its own commit so I can cherry-pick around it.

## Copyright

Copyright (c) 2012 jribeiro. See LICENSE.txt for
further details.
