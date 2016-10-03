# -*- mode: ruby -*-
# vi: set ft=ruby :

PROVISIONING_ROOT = "/vagrant/provision"

Vagrant.configure("2") do |config|
  config.vm.box = "debian/wheezy64"
  config.vm.box_check_update = false

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1536"
  end

  config.vm.define "app" do |app|
    app.vm.network "private_network", ip: "192.168.33.20"
    app.ssh.forward_agent = true

    app.vm.synced_folder ".", "/var/www/app", type: "nfs"

    app.vm.provider "virtualbox" do |vb|
      vb.memory = "1024"
    end

    app.vm.provision "system", type: "shell", path: "provision/system.sh", env: { "PROVISIONING_ROOT" => PROVISIONING_ROOT }
    app.vm.provision "configure", type: "shell", path: "provision/configure.sh", privileged: false
  end
end
