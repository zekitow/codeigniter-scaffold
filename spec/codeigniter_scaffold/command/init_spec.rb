require "spec_helper"

describe CodeigniterScaffold::Command::Init do

  context "#run" do
    before(:all) { CodeigniterScaffold::Command::Init.new.run(nil) }

    after(:all) do
      unziped = ["application","index.php","system"]
      unziped.each { |f| FileUtils.rm_rf Dir.glob(f) }
    end

    it { File.should be_directory(File.join(Dir.pwd,"/application")) }
    it { File.should be_directory(File.join(Dir.pwd,"/system")) }
  end
end
