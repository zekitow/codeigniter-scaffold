module CodeigniterScaffold
  module Command
    class Init

      def run(args)
        ci_dir = File.dirname(__FILE__) + "/../../resources/ci_2.1.2.zip"
        unzip_file(ci_dir, Dir.pwd)
      end

      def unzip_file(file, destination)
        ::Zip::ZipFile.open(file) do |zip_file|
          zip_file.each do |f|
            f_path = File.join(destination, f.name)
            FileUtils.mkdir_p(File.dirname(f_path))
            zip_file.extract(f, f_path) unless File.exist?(f_path)
          end
        end
      end

    end
  end
end
