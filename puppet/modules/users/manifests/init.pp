class users {

  user { "mikep":
    uid => 9001,
    gid => 9001,
    groups => ["webdev", "sudo"],
    ensure => "present",
    shell => "/bin/bash",
    managehome => true,
    password => '$6$Cuz4H4lE$nYwt7pa7NrTK97X6y4iuc8jg0kWlOewE34382inuxm7wVAtpv4vFO2tOZ9kpg99lnUWiISbS7W8N5uoeaUOb3/'

  }

  ssh_authorized_key { 'mikepmtl@me.com':
    user => 'mikep',
    type => 'ssh-rsa',
    key  => 'AAAAB3NzaC1yc2EAAAADAQABAAABAQC26v0ZkQckrVOAhyzdvF+uYvFdYXZE1VDiuF8fe61XsFtDCVY/unguQ04EE+O4WvXEd0Af2SwNMq4wdKrxOeWo8YnkJhlo5Nxqdxyi6DkXTlE7wQf1KUa89zeJnSZRpeeJiZkm+fPbzWSlDGnXNWbB5KpeI1Di+TpuIthU8QXHVIPa2TQ9wdskTkxGE0r1xzIyeTiOoqQybX7LeMrPc9J9aqqFzT/WM8Rff7bwK/Dix30UiuhE1Y37ki9qZgN2HBaPW8uKkOBQFUZUaeNFiUwwqZxPSUYHVITSIxIppOW0VVjG2aHLaqsp4FlZ8Gv8/keLzmbRS0AuXeMI516MO1nV',
  }


}