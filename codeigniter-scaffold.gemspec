Gem::Specification.new do |s|
  s.name        = 'codeigniter-scaffold'
  s.version     = '0.0.0'
  s.date        = '2012-08-01'
  s.summary     = "CodeigniterScaffold"
  s.description = "Generates simple cruds for codeigniter 2."
  s.authors     = ["José Ribeiro Filho"]
  s.email       = 'nick@quaran.to'
  s.homepage    = 'http://rubygems.org/gems/hola'
  s.files         = `git ls-files`.split("\n")
  s.test_files    = `git ls-files -- {spec}/*`.split("\n")
  s.executables   = `git ls-files -- bin/*`.split("\n").map{ |f| File.basename(f) }
end
