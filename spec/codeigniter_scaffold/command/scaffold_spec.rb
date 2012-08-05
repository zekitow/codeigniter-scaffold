require "spec_helper"

describe CodeigniterScaffold::Command::Scaffold do

  context "#run" do
    let(:error_message) { "Some arguments are needed, please, try again." }
    subject { CodeigniterScaffold::Command::Scaffold.new.run(args) }

    context "args are not sent" do
      let(:args) { [nil] }

      it "show error to user" do
        Kernel.should_receive(:puts).with(error_message)
        subject
      end
    end

    context "args are sent" do
      context "and it's empty" do
        let(:args) { "" }

        it "show error to user" do
          Kernel.should_receive(:puts).with(error_message)
          subject
        end
      end

      context "and it just have model name" do
        let(:args) { ["user"] }

        it "show error to user" do
          Kernel.should_receive(:puts).with(error_message)
          subject
        end
      end

      context "with various fields" do
        subject { CodeigniterScaffold::Command::Scaffold.new }

        before { subject.run(args) }

        let(:args) { ["user","name:string","password:string"] }

        its(:model) { should eq "User" }

      end
    end
  end
end
