require "spec_helper"

describe CodeigniterScaffold::Command::Init do

  context "#run" do
    subject { CodeigniterScaffold::Command::Init.new.run(nil) }

    let(:destination) { Dir.pwd }

    after(:all) do
      unziped = ["application","index.php","system","user_guide"]
      unziped.each { |f| FileUtils.rm_rf Dir.glob(f) }
    end

    it "unzip ci/ci_2.1.2.zip" do
      CodeigniterScaffold::Command::Init.any_instance.should_receive(:unzip_file).with("ci/ci_2.1.2.zip", destination)
      subject
    end
  end
end
