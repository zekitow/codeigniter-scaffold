require "spec_helper"

describe CodeigniterScaffold::Executor do

  let(:executor) { CodeigniterScaffold::Executor.new  }

  context "when arguments are not sent" do

    it "show help for user" do
      executor.run(nil).should == CodeigniterScaffold::Command::Help
    end
  end

end
