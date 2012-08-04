require "spec_helper"

describe CodeigniterScaffold::Command::Scaffold do

  context "#run" do

    subject { CodeigniterScaffold::Command::Scaffold.new.run(args) }

    context "empty args are sent" do
      let(:args) { "" }

      it "show error to user" do
        Kernel.should_receive(:puts).with("Some arguments are needed, please, try again.")
        subject
      end
    end

    context "nil args are sent" do
      let(:args) { [nil] }

      it "show error to user" do
        Kernel.should_receive(:puts).with("Some arguments are needed, please, try again.")
        subject
      end
    end

    context "only model are sent" do

      let(:args) { ["user"] }

      it "show error to user" do
        Kernel.should_receive(:puts).with("Some arguments are needed, please, try again.")
        subject
      end
    end

  end
end
