require "spec_helper"

describe CodeigniterScaffold::Command::Help do

  context "#run" do

    subject { CodeigniterScaffold::Command::Help.new.run(nil) }

    it "shows the usage" do
      Kernel.should_receive(:puts).with("Usage: codeigniter-scaffold [options...]\r\n")
      Kernel.should_receive(:puts).with("  -h, --help show this help\r\n")
      Kernel.should_receive(:puts).with("  -i, --init unzip a codeigniter 2.1.2 installaion in the current dir\r\n")
      Kernel.should_receive(:puts).with("  -s, --scaffold <model-name> field1:string, field2:text field3:integer, and so on.. \r\n")
      subject
    end

  end
end
