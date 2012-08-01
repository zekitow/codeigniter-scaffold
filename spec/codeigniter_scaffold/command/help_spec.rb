require "spec_helper"

describe CodeigniterScaffold::Command::Help do

  context "#run" do

    subject { CodeigniterScaffold::Command::Help.new.run(nil) }

    it "shows available runners help commands" do
      Kernel.should_receive(:print).with("Available runners for codeigniter  are: #{CodeigniterScaffold::COMMANDS.keys.join(', ')}")
      Kernel.should_receive(:print).with("Usage:\r\n\tcodeigniter-scaffold runner")
      subject
    end
  end
end
