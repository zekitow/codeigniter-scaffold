require "spec_helper"

describe CodeigniterScaffold::Command::Scaffold do

  before { Kernel.stub(:exit) }
  let(:scaffolder) { CodeigniterScaffold::Command::Scaffold.new }

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

      context "and it's not empty" do
        context "when attributes are invalid" do
          context "and it just have model name" do
            let(:args) { ["user"] }

            it "show error to user" do
              Kernel.should_receive(:puts).with(error_message)
              subject
            end
          end

          context "with invalid attributes" do
            let(:args) { ["user","name:varchar2"] }

            subject do
              scaffolder.run(args)
              scaffolder.attributes.first
            end

            it "validates field type" do
              Kernel.should_receive(:exit)
              subject
            end
          end
        end

        context "when attributes are valid" do
          context "with model" do
            let(:args) { ["user","name:string","password:string"] }

            subject { CodeigniterScaffold::Command::Scaffold.new }
            before  { subject.run(args) }

            its(:model) { should eq "User" }
          end

          context "with attributes" do
            context "when attribute is string" do
              let(:args) { ["user","name:string"] }

              subject do
                scaffolder.run(args)
                scaffolder.attributes.first
              end

              its(:name)       { should == "name" }
              its(:type)       { should == "string" }
              its(:mysql_type) { should == "VARCHAR(255)" }
            end

            context "when attribute is text" do
              let(:args) { ["user","name:text"] }

              subject do
                scaffolder.run(args)
                scaffolder.attributes.first
              end

              its(:name)       { should == "name" }
              its(:type)       { should == "text" }
              its(:mysql_type) { should == "TEXT" }
            end

            context "when attribute is text" do
              let(:args) { ["user","name:integer"] }

              subject do
                scaffolder.run(args)
                scaffolder.attributes.first
              end

              its(:name)       { should == "name" }
              its(:type)       { should == "integer" }
              its(:mysql_type) { should == "INT" }
            end
          end
        end
      end
    end
  end
end
